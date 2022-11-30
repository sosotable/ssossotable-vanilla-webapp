import pymysql.cursors
import pymysql
import pandas as pd
import numpy as np
from itertools import combinations
import json

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
        foods=cursor.fetchall()
        sql = "SELECT * FROM `rating`"
        cursor.execute(sql)
        ratings=cursor.fetchall()
        sql = "SELECT * FROM `trait`"
        cursor.execute(sql)
        traits=cursor.fetchall()
        
foods=pd.DataFrame(foods)
ratings=pd.DataFrame(ratings)
traits=pd.DataFrame(traits)

users=list(ratings['userid'].unique())
users_combi=list(combinations(users, 2))

ratings=ratings.merge(foods,left_on='foodid',right_on='id')
ratings=ratings.merge(traits,left_on='foodid',right_on='id')
ratings=ratings.drop(['id_x','id_y','image','trait','image_iyj','image_jhw','image_yhj'],axis=1)

trait_cols=list(traits.columns)
del trait_cols[0]

for col in trait_cols:
    ratings[col] = ratings[col]*ratings['rating']

user_profile=ratings.groupby('userid')[trait_cols].mean()

user_tastes={}
for combi in users_combi:
    user=str(combi[0])+'-'+str(combi[1])
    std=user_profile.loc[[combi[0],combi[1]]].describe().loc['std'].sort_values()
    std=std.replace(np.NaN,std.mean())
    std=std.replace(0,std.mean())
    user_tastes[user]=pd.concat([std[:3],std[-3:]]).to_json()

with open('/var/www/html/database/user_tastes.json','w') as f:
    json.dump(user_tastes, f, ensure_ascii=False, indent=4)
