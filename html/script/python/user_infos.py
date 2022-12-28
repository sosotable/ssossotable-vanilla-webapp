import pymysql.cursors
import pymysql
import pandas as pd
import numpy as np
import seaborn as sns
import matplotlib.pyplot as plt
from sklearn.linear_model import Lasso
from sklearn.model_selection import RandomizedSearchCV
from scipy.stats import uniform as sp_rand
from itertools import combinations
import json
from matplotlib import font_manager, rc

font_path = "path"
font = font_manager.FontProperties(fname=font_path).get_name()
rc('font', family=font)

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
        food = cursor.fetchall()
        sql = "SELECT * FROM `rating`"
        cursor.execute(sql)
        rating = cursor.fetchall()
        sql = "SELECT * FROM `trait`"
        cursor.execute(sql)
        trait = cursor.fetchall()

foods = pd.DataFrame(food)
ratings = pd.DataFrame(rating)
trait = pd.DataFrame(trait)

foods = foods.drop(['image', 'trait', 'image_iyj', 'image_yhj', 'image_jhw'], axis=1)
users = list(ratings['userid'].unique())
ratings = ratings.merge(trait, how='inner', left_on='foodid', right_on='id')
ratings = ratings.drop('id', axis=1)
trait = trait.set_index('id')
trait_cols = list(trait.columns)

users=list(ratings['userid'].unique())
users_combi=list(combinations(users, 2))

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

user_profile_recommendation=user_profile.copy()
user_profile_recommendation=user_profile_recommendation.drop('intercept',axis=1)

user_profile_recommendation_kor=user_profile_recommendation.copy()

user_profile_recommendation_kor.rename(columns = {
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

sorted_recommendation_user_json={}
sorted_recommendation_user_json_kor={}

for idx,row in user_profile_recommendation.iterrows():
    u=(user_profile_recommendation.loc[idx].sort_values(ascending=False))[:3]
    sorted_recommendation_user_json[idx]=u.to_json()
    u=(user_profile_recommendation_kor.loc[idx].sort_values(ascending=False))[:3]
    sorted_recommendation_user_json_kor[idx]=u.to_json()

with open('path','w', encoding='utf-8') as f:
    json.dump(sorted_recommendation_user_json, f, ensure_ascii=False, indent=4)

with open('path','w', encoding='utf-8') as f:
    json.dump(sorted_recommendation_user_json_kor, f, ensure_ascii=False, indent=4)

sorted_users={}

for idx in user_profile_recommendation.index:
    sorted_users[idx]=user_profile_recommendation.loc[idx].sort_values()

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

for key in sorted_users.keys():
    filename=''
    plt.subplot(1, 1, 1)                # nrows=2, ncols=1, index=1
    plt.plot(sorted_users[key])
    plt.title('user_profile')
    plt.ylabel('rating')
    plt.tight_layout()
    filename='path'+str(key)+('.png')
    plt.savefig(filename)
    plt.cla()

ratings_taste=ratings.copy()

for col in trait_cols:
    ratings_taste[col] = ratings_taste[col]*ratings_taste['rating']

ratings_taste[trait_cols]=ratings_taste[trait_cols].replace(0,np.NaN)
user_profile_taste=ratings_taste.groupby('userid')[trait_cols].mean()

user_tastes={}

for combi in users_combi:
    user=str(combi[0])+'-'+str(combi[1])
    std=user_profile_taste.loc[[combi[0],combi[1]]].describe().loc['std'].sort_values()
    user_tastes[user]=std[:3].to_json()

with open('path','w') as f:
    json.dump(user_tastes, f, ensure_ascii=False, indent=4)

ratings_taste=ratings.copy()
for col in trait_cols:
    ratings_taste[col] = ratings_taste[col]*ratings_taste['rating']

ratings_taste[trait_cols]=ratings_taste[trait_cols].replace(0,np.NaN)
user_profile_taste=ratings_taste.groupby('userid')[trait_cols].mean()

user_profile_taste.rename(columns = {
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
    std=user_profile_taste.loc[[combi[0],combi[1]]].describe().loc['std'].sort_values(ascending=False)
    std=std.replace(np.NaN,std.mean())
    std=std.replace(0,std.mean())
    tastes_std[user]=std

tastes_std[users]=tastes_std[users]*-1

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