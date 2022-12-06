pimport pymysql.cursors
import pymysql
import pandas as pd
import numpy as np
import seaborn as sns
import matplotlib.pyplot as plt
from sklearn.metrics import mean_squared_error
from sklearn.metrics import mean_absolute_error
from sklearn.model_selection import train_test_split
from matplotlib import font_manager, rc

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
rating=pd.DataFrame(rating)
trait=pd.DataFrame(trait)

users=rating.groupby('userid')['foodid'].count()
rating_count=rating.groupby('foodid')['userid'].count()
train, test=train_test_split(rating, random_state=7968, test_size=0.1)
ratings=rating.merge(trait, how='inner', left_on='foodid', right_on='id')
ratings=ratings.replace(0,np.nan)

cols=list(trait.columns)
del cols[0]
train, test=train_test_split(ratings, random_state=7968, test_size=0.1)

for col in cols :
    train[col]=train[col] * train['rating']

user_profile=train.groupby('userid')[cols].mean()
user_profile.to_json('./user_profile.json')

predict=[]
for idx,row in test.iterrows():
    user=row['userid']
    predict.append((user_profile.loc[user]*row[cols]).mean())

test['predict']=predict

sorted_users={}
for idx in user_profile.index:
    user_profile.loc[idx]=user_profile.loc[idx].fillna(user_profile.loc[idx].mean())
    sorted_users[idx]=user_profile.loc[idx].sort_values()

for key in sorted_users.keys():
    sorted_users[key]=sorted_users[key].rename({
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
    'fruit'           :   '과일'
    })

for key in sorted_users.keys():
    df1=sorted_users[key][0:3]
    df2=sorted_users[key][-3:]
    sorted_users[key]=pd.concat([df1,df2])

from matplotlib import font_manager, rc
font_path = "/usr/share/fonts/truetype/nanum/NanumBarunGothic.ttf"
font = font_manager.FontProperties(fname=font_path).get_name()
rc('font', family=font)

for key in sorted_users.keys():
    filename=''
    plt.subplot(1, 1, 1)                # nrows=2, ncols=1, index=1
    plt.plot(sorted_users[key])
    plt.title('user_profile')
    plt.ylabel('rating')
    plt.tight_layout()
    filename='/var/www/html/config/ratingInfos/'+str(key)+('.png')
    plt.savefig(filename)
    plt.cla()
