import pymysql.cursors
import pymysql
import pandas as pd
import numpy as np
from sklearn.metrics import mean_squared_error
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.linear_model import Lasso


connection = pymysql.connect(host='*',
                             user='*',
                             password='*',
                             database='*',
                             cursorclass=pymysql.cursors.DictCursor)

with connection:
    with connection.cursor() as cursor:
        # Read a single record
        sql = "SELECT * FROM `*`"
        cursor.execute(sql)
        foods=cursor.fetchall()
        sql = "SELECT * FROM `*`"
        cursor.execute(sql)
        ratings=cursor.fetchall()
        sql = "SELECT * FROM `*`"
        cursor.execute(sql)
        traits=cursor.fetchall()

foods=pd.DataFrame(foods)
ratings=pd.DataFrame(ratings)
traits=pd.DataFrame(traits)

ratings=ratings.merge(traits, how='inner', left_on='foodid', right_on='id')
ratings=ratings.drop('id',axis=1)
traits=traits.set_index('id',drop=True)

train, test=train_test_split(ratings,test_size=0.1,random_state=7968)

user_profile_list_lasso=[]

for userId in train['userid'].unique():
    user=train[train['userid']==userId]
    X_train=user[traits.columns]
    y_train=user['rating']

    reg=Lasso(alpha=0.03)
    reg.fit(X_train,y_train)
    user_profile_list_lasso.append([reg.intercept_, *reg.coef_])

user_profile_lasso=pd.DataFrame(
    user_profile_list_lasso,
    index=train['userid'].unique(),
    columns=['intercept', *traits.columns])

predict=[]
for idx,row in test.iterrows():
    user=row['userid']
    intercept=user_profile_lasso.loc[user,'intercept']
    genre_score=sum(user_profile_lasso.loc[user,traits.columns] * row[traits.columns])
    expected_score=intercept+genre_score
    predict.append(expected_score)

test['predict']=predict

user_profile_lasso.index.name='id'

user_profile_lasso.to_csv('PATH',index=True, encoding="utf-8-sig")
user_profile_lasso.to_json('PATH')