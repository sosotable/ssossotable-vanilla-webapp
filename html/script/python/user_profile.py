import pymysql.cursors
import pymysql
import pandas as pd
import numpy as np
import seaborn as sns
import matplotlib.pyplot as plt
from sklearn.metrics import mean_squared_error
from sklearn.metrics import mean_absolute_error
from sklearn.model_selection import train_test_split
from matplotlib import font_manager, rc

connection = pymysql.connect(host='*',
                             user='*',
                             password='*',
                             database='*',
                             cursorclass=pymysql.cursors.DictCursor)

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
rating=pd.DataFrame(rating)
trait=pd.DataFrame(trait)

users=rating.groupby('userid')['foodid'].count()
rating_count=rating.groupby('foodid')['userid'].count()
ratings=rating.merge(trait, how='inner', left_on='foodid', right_on='id')
ratings=ratings.replace(0,np.nan)
cols=list(trait.columns)
del cols[0]

train, test=train_test_split(ratings, random_state=7968, test_size=0.1)

for col in cols :
    train[col]=train[col] * train['rating']

user_profile=train.groupby('userid')[cols].mean()

user_profile.to_json('/var/www/html/database/user_profile.json')

predict=[]
for idx,row in test.iterrows():
    user=row['userid']
    predict.append((user_profile.loc[user]*row[cols]).mean())

test['predict']=predict