import pymysql.cursors
import pymysql
import pandas as pd
import numpy as np

from sklearn.model_selection import train_test_split
from sklearn.metrics import mean_squared_error

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

food=pd.DataFrame(food)
rating=pd.DataFrame(rating)
trait=pd.DataFrame(trait)

food.to_csv('/var/www/html/database/food.csv', index=False, encoding="utf-8-sig")
rating.to_csv('/var/www/html/database/rating.csv', index=False, encoding="utf-8-sig")
trait.to_csv('/var/www/html/database/trait.csv', index=False, encoding="utf-8-sig")

ratings=rating.merge(trait, how='inner', left_on='foodid', right_on='id')
ratings=ratings.replace(0,np.nan)
train, test=train_test_split(ratings, random_state=7968, test_size=0.1)

cols=list(trait.columns)
del cols[0]

for col in cols :
    train[col]=train[col] * train['rating']

user_profile=train.groupby('userid')[cols].mean()

user_profile.to_csv('/var/www/html/database/user_profile.csv', index=True, encoding="utf-8-sig")