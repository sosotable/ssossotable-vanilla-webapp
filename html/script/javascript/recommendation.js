
async function set_user_profile() {
    userProfile.userId=userId

    info=JSON.parse(await $.ajax({
        type: "POST",
        url: 'http://ssossotable.com/script/php/JSONHandler.php',
        data:{
            'path':'http://ssossotable.com/database/user_profile_lasso.json'
        }}))
    let keys=Object.keys(info)
    for(let i=0; i < keys.length; i++) {
        userProfile[keys[i]]=info[keys[i]][userProfile.userId]
    }
}
function rand(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
async function set_food_traits() {
    traits={}
    init_traits=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data:{
            0:'select',
            1:"*",
            2:"trait",
            3:`1>0`
        }}))
    for(let i=0;i<init_traits.length;i++) {
        let idx=init_traits[i][0]
        traits[idx]={
            korean:init_traits[i][1],
            japanese:init_traits[i][2],
            chinese:init_traits[i][3],
            western:init_traits[i][4],
            fried:init_traits[i][5],
            grilled:init_traits[i][6],
            soup:init_traits[i][7],
            stir_fried:init_traits[i][8],
            raw:init_traits[i][9],
            steamed:init_traits[i][10],
            beverage:init_traits[i][11],
            asian:init_traits[i][12],
            sweetness:init_traits[i][13],
            sour_taste:init_traits[i][14],
            spicy:init_traits[i][15],
            noodle:init_traits[i][16],
            seafood:init_traits[i][17],
            meat:init_traits[i][18],
            vegetable:init_traits[i][19],
            spice:init_traits[i][20],
            rice:init_traits[i][21],
            dessert:init_traits[i][22],
            wheat:init_traits[i][23],
            soda:init_traits[i][24],
            slimy:init_traits[i][25],
            fruit:init_traits[i][26]
        }
        if(i===init_traits.length-1) {
            trait_keys=Object.keys(traits[idx])
        }
    }
}
async function init() {
    flag = !!mql.matches;
    await set_food_traits()
    await set_user_profile()

    combi=''
    const friends=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data:{
            0:'select',
            1:"id,image,nickname",
            2:"user",
            3:`id in (select friendid from user, friend where user.id=${userId} and user.id=friend.userid);`
        }}))
    const selectedFriend=friends[rand(0,friends.length-1)]
    const info=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/JSONHandler.php',
        data: {
            'path':'/var/www/html/database/user_tastes.json'
        }}))
    const user_profiles=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/JSONHandler.php',
        data: {
            'path':'/var/www/html/database/user_food_recommendation.json'
        }}))
    const user_profiles_kor=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/JSONHandler.php',
        data: {
            'path':'/var/www/html/database/user_food_recommendation_kor.json'
        }}))
    const user_profile=JSON.parse(user_profiles[userId])
    const user_profile_kor=JSON.parse(user_profiles_kor[userId])
    const profile_keys=Object.keys(user_profile)
    const profile_keys_kor=Object.keys(user_profile_kor)
    const selected_trait_idx=rand(0,profile_keys.length-1)

    const info_keys=Object.keys(info)
    if(info_keys.includes(String(selectedFriend[0])+'-'+String(userId))) { combi=String(selectedFriend[0])+'-'+String(userId) }
    else { combi=String(userId)+'-'+String(selectedFriend[0]) }
    document.getElementById('friend-recommendation-title').innerHTML=`
        오늘은 ${selectedFriend[2]}님과<br>이런 음식을 먹어보는건 어때요?
    `
    document.getElementById('friend-image').src=selectedFriend[1]
    document.getElementById('friend-name').innerText=selectedFriend[2]

    const selected_friend_trait=JSON.parse(info[combi])
    const selected_friend_trait_keys=Object.keys(selected_friend_trait)

    let where_form=``
    for(let i=0;i<selected_friend_trait_keys.length;i++) {
        where_form+=`${selected_friend_trait_keys[i]}=1`
        if(i<selected_friend_trait_keys.length-1) {
            where_form+=' or '
        }
    }
    const friend_food_recommendation=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data:{
            0:'select',
            1:"distinct id,name,image",
            2:"food natural join rating",
            3:`food.id=rating.foodid and `+
                `rating.userid=${userId} or rating.userid=${selectedFriend[0]} and `+
                `rating.rating>=8 and `+
                `food.id in (select id from trait where ${where_form});`
        }}))

    my_ratings=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data:{
            0:'select',
            1:"food.id, food.name, food.image, rating.rating",
            2:"food,rating",
            3:`rating.userid=${userId} and rating.rating>=8 and food.id=rating.foodid`
        }}))
    ratings=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data:{
            0:'select',
            1:"*",
            2:"food",
            3:`id not in (select foodid from rating where userid=${userId})`
        }}))
    const trait_food_recommendation=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data:{
            0:'select',
            1:"id,name,image",
            2:"food",
            3:`id `+
                `IN( `+
                `SELECT foodid `+
                `FROM rating,trait `+
                `WHERE rating.foodid=trait.id AND rating.userid=${userId} AND rating.rating>=8 AND trait.${profile_keys[selected_trait_idx]}=1)`
        }}))
    const trait_food_recommendation_keys=Object.keys(trait_food_recommendation)

    for(let i=0;i<ratings.length;i++) {
        trait_info=traits[ratings[i][0]]
        let ex_rating=userProfile['intercept']
        for(let i=0;i<trait_keys.length;i++) {
            let trait_name=trait_keys[i]
            if(parseInt(trait_info[trait_name])===1) {
                ex_rating+=userProfile[trait_name]
            }
        }
        ex_rating=(ex_rating/2).toFixed(1)
        if(ex_rating>=4) {
            unrating[ratings[i][0]]={
                name:ratings[i][1],
                image:ratings[i][2],
                predict:ex_rating
            }
        }
    }
    unrating_keys=Object.keys(unrating)

    let selected_my_rating = new Set()
    let selected_friend_rating = new Set()
    let selected_food_rating = new Set()
    let selected_foods_1 = ``
    let selected_friend_foods=``
    let selected_foods_2 = ``

    while (selected_friend_rating.size < 5) { selected_friend_rating.add(rand(0, friend_food_recommendation.length - 1)) }
    while (selected_my_rating.size < 5) { selected_my_rating.add(rand(0, my_ratings.length - 1)) }
    if(trait_food_recommendation_keys.length<5) { while(selected_food_rating.size<trait_food_recommendation_keys.length) { selected_food_rating.add(rand(0, trait_food_recommendation_keys.length - 1)) } }
    else { while(selected_food_rating.size<5) { selected_food_rating.add(rand(0, trait_food_recommendation_keys.length - 1)) } }
    for (let item of selected_friend_rating) {
        selected_friend_foods += `
                    <div class="list-group-item">
                        <div class="box">
                            <img class="card-img" src="${friend_food_recommendation[item][2]}" alt="..."/>
                        </div>
                        <span>${friend_food_recommendation[item][1]}</span>
                    </div>
                    `
    }
    for (let item of selected_my_rating) {
        selected_foods_1 += `
                    <div class="list-group-item">
                        <div class="box">
                            <img class="card-img" src="${my_ratings[item][2]}" alt="..."/>
                        </div>
                        <span>${my_ratings[item][1]}</span>
                    </div>`
    }
    for (let item of selected_food_rating) {
        selected_foods_2 += `
                    <div class="list-group-item">
                        <div class="box">
                            <img class="card-img" src="${trait_food_recommendation[item][2]}" alt="..."/>
                        </div>
                        <span>${trait_food_recommendation[item][1]}</span>
                    </div>
                    `
    }
    document.getElementById('friend-recommendation-list').innerHTML=selected_friend_foods
    document.getElementById('food-recommendation-list-1').innerHTML=selected_foods_1
    document.getElementById('food-recommendation-list-2').innerHTML=selected_foods_2

    document.getElementById('food-recommendation-title-2').innerHTML=`
    <h3>높은 점수를 준</h3><h5>${profile_keys_kor[selected_trait_idx]} 특성의 음식들이에요</h5>
    `
}