import pymysql.cursors
import pymysql
import pandas as pd
import numpy as np
import seaborn as sns
import matplotlib.pyplot as plt
from sklearn.metrics import mean_squared_error
from sklearn.metrics import mean_absolute_error
from sklearn.model_selection import train_test_split
from sklearn.linear_model import Lasso
from sklearn.model_selection import RandomizedSearchCV
from scipy.stats import uniform as sp_rand

connection = pymysql.connect

with connection:
    with connection.cursor() as cursor:
        # Read a single record
        sql = "SELECT * FROM `food`"
        cursor.execute(sql)
        food=cursor.fetchall()
        sql = "SELECT * FROM `rating`"
        cursor.execute(sql)
        rating=cursor.fetchall()
        sql = "SELECT * FROM `trait`"
        cursor.execute(sql)
        trait=cursor.fetchall()

foods=pd.DataFrame(food)
ratings=pd.DataFrame(rating)
trait=pd.DataFrame(trait)

foods=foods.drop(['image','trait','image_iyj','image_yhj','image_jhw'],axis=1)
users=list(ratings['userid'].unique())
ratings=ratings.merge(trait,how='inner',left_on='foodid',right_on='id')
ratings=ratings.drop('id',axis=1)
trait=trait.set_index('id')
trait_cols=list(trait.columns)

model=Lasso()
param_grid={'alpha':sp_rand()}
rsearch=RandomizedSearchCV(estimator=model,param_distributions=param_grid,n_iter=200,cv=20,random_state=7968)

user_profile_list=[]
for user in users:
    rsearch.fit(ratings[ratings['userid']==user][trait_cols],ratings[ratings['userid']==user]['rating'])
    user_profile_list.append([rsearch.best_estimator_.intercept_,*rsearch.best_estimator_.coef_])

user_profile=pd.DataFrame(user_profile_list,index=users,columns=['intercept',*trait_cols])
user_profile.index.name='id'

user_profile.to_csv('path',index=True, encoding="utf-8-sig")
user_profile.to_json('path')