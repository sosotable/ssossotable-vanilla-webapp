import pymysql.cursors
import pymysql
import pandas as pd
import numpy as np
from sklearn.metrics import mean_squared_error
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.linear_model import Lasso
from itertools import combinations
import json
import matplotlib.pyplot as plt

connection = pymysql.connect

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

user_profile.rename(columns = {
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

tastes_std=pd.DataFrame()
users=[]

for combi in users_combi:
    user=str(combi[0])+'-'+str(combi[1])
    users.append(user)
    std=user_profile.loc[[combi[0],combi[1]]].describe().loc['std'].sort_values(ascending=False)
    std=std.replace(np.NaN,std.mean())
    std=std.replace(0,std.mean())
    tastes_std[user]=std

tastes_std[users]=tastes_std[users]*-1

from matplotlib import font_manager, rc
font_path = "path"
font = font_manager.FontProperties(fname=font_path).get_name()
rc('font', family=font)

for key in tastes_std.keys():
    low=tastes_std[key].sort_values()[:3]
    high=tastes_std[key].sort_values()[-3:]
    res=pd.concat([low,high])
    filename=str(key)+'.png'
    plt.subplot(1, 1, 1)
    plt.plot(res)
    plt.title('user_profile')
    plt.ylabel('rating')
    plt.tight_layout()
    plt.savefig('path'+filename)
    plt.cla()