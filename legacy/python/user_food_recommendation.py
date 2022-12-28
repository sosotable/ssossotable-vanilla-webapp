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
import json

from matplotlib import font_manager, rc
font_path = "path"
font = font_manager.FontProperties(fname=font_path).get_name()
rc('font', family=font)

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
user_profile=user_profile.drop('intercept',axis=1)
user_profile_kor=user_profile.copy()

user_profile_kor.rename(columns = {
    'sour_taste'    : '신맛',
    'dessert'       : '간식',
    'vegetable'     : '채소',
    'sweetness'     : '단맛',
    'korean'        : '한식',
    'asian'         : '아시아',
    'rice'          : '쌀',
    'soup'          : '국물',
    'raw'           : '생식',
    'stir_fried'    : '볶음',
    'japanese'      : '일식',
    'wheat'         : '밀',
    'steamed'       : '찜',
    'noodle'        : '면',
    'spicy'         : '매운맛',
    'meat'          : '고기',
    'seafood'       : '해물',
    'grilled'       : '구이',
    'chinese'       : '중식',
    'western'       : '양식',
    'spice'         : '향신료',
    'fried'         : '튀김',
    'beverage'      : '음료',
    'slimy'         : '물컹거림',
    'soda'            :   '탄산',
    'salty'           :   '짠맛',
    'fruit'           :   '과일',
    'stinky'           :   '냄새',
    'chewy'           :   '쫄깃함',
    'offal'           :   '부속고기'
    },inplace=True)

sorted_user_json={}
sorted_user_json_kor={}

for idx,row in user_profile.iterrows():
    u=(user_profile.loc[idx].sort_values(ascending=False))[:3]
    sorted_user_json[idx]=u.to_json()
    u=(user_profile_kor.loc[idx].sort_values(ascending=False))[:3]
    sorted_user_json_kor[idx]=u.to_json()

with open('path','w', encoding='utf-8') as f:
    json.dump(sorted_user_json, f, ensure_ascii=False, indent=4)

with open('path','w', encoding='utf-8') as f:
    json.dump(sorted_user_json_kor, f, ensure_ascii=False, indent=4)