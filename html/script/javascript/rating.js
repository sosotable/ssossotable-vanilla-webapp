function getScore() {
    let width=parseInt(arguments[2])/2
    let height=parseInt(arguments[2])
    switch (parseInt(arguments[0])) {
        case -1:
            return `
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]})" alt="...">`
        case 0:
            return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]})" alt="...">`
        case 1:
            return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]})" alt="...">`
        case 2:
            return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]})" alt="...">`
        case 3:
            return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]})" alt="...">`
        case 4:
            return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]})" alt="...">`
        case 5: return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]})" alt="...">`
        case 6: return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]})" alt="...">`
        case 7: return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]})" alt="...">`
        case 8: return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]})" alt="...">`
        case 9: return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]})" alt="...">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]})" alt="..."><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]})" alt="...">`
        default:
            break
    }
}
function makeDiv() {
    let height=parseInt(arguments[3])
    const score=getScore(arguments[4],arguments[0],height)
    return `
          <div onclick="show_foodinfo(${arguments[0]});" style="height: 100%;" class="list-group-item list-group-item-action py-3 lh-tight d-flex food-list" aria-current="true" id="${arguments[0]}">
                <div class="rating-image" id="img_${arguments[0]}" style="height:160px; width:160px;" onclick="foodInfo(${arguments[0]})" class="food-image">
                    <div class="box" style="height:120px; width:120px; margin: 0;"><img class="profile" src="${arguments[2]}" alt="..."></div>
                </div>
                <div style="width: 100%; display: inline-block; margin: 0 0 0 20px;" class="rating_content" id="content_${arguments[0]}">
                    <div class="d-flex justify-content-between fs-3" style="font-size: 25px; margin: 0 !important; padding: 0 !important;" class="food-name">
                        <span class="food-name">${arguments[1]}</span>
                        <span id="predict-${arguments[0]}" class="food-predict">예상 점수: ${unrating[arguments[0]].predict}</span>
                    </div>
                    <div class="d-flex justify-content-start fs-2 food-rating" id="rating_${arguments[0]}" style=" margin: 0 !important; padding: 0 !important;">
                        ${score}
                    </div>
                </div>
            </div>`

}
async function set_user_profile() {
    userProfile.userId=id

    let info=JSON.parse(await $.ajax({
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

    ratings=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data:{
            0:'select',
            1:"*",
            2:"food",
            3:`id not in (select foodid from rating where userid=${id})`
        }}))

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
        unrating[ratings[i][0]]={
            name:ratings[i][1],
            image:ratings[i][2],
            predict:ex_rating
        }
        unrating_dict[ratings[i][0]]=makeDiv(ratings[i][0],ratings[i][1],ratings[i][2],80,-1)
    }
    unrating_keys=Object.keys(unrating)

    let inner=''
    if(unrating_keys.length>20) {
        for(let i=0;i<20;i++) {
            inner+=unrating_dict[unrating_keys[i]]
        }
        rating_list=document.getElementsByClassName('food-list')
        for(let i=20;i<rating_list.length;i++) {
            rating_list[i].style.cssText = "height: 140px; display: none!important";
        }
        ratingIdx+=20
    }
    else {
        for(let i=0;i<unrating_keys.length;i++) {
            inner+=unrating_dict[unrating_keys[i]]
        }
        lim=unrating_keys.length
    }
    inner+=loading
    document.getElementById('scroll_layout').innerHTML=inner

}
async function foodInfo() {
    const name=unrating[arguments[0]].name
    if(flag===false) {
    }
    else {
        const form = document.createElement("form");

        form.setAttribute("type", "hidden");
        form.setAttribute("id","food-info")
        form.setAttribute("action","foodinfo.php")
        form.setAttribute("method","post")

        const input = document.createElement("input")

        input.setAttribute("type", "hidden");
        input.setAttribute("name", "food_name");
        input.setAttribute("value", `'${name}'`);

        form.appendChild(input)
        document.getElementById(`img_${arguments[0]}`).appendChild(form)

        document.getElementById("food-info").submit()
    }
}
async function set() {
    score = arguments[0] + 1
    let set_info = JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data: {
            0: 'select',
            1: '*',
            2: 'rating',
            3: `userid=${id} and foodid=${arguments[1]};`
        }
    }))

    if (set_info.length > 0) {
        await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0: 'update',
                1: 'rating',
                2: `rating=${score}`,
                3: `userid=${id} and foodid=${arguments[1]};`
            }
        })
    } else {
        await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0: 'insert',
                1: 'rating(userid,foodid,rating)',
                2: `${id},${arguments[1]},${score}`
            }
        })
    }
    document.getElementById(`rating_${arguments[1]}`).innerHTML=getScore(arguments[0],arguments[1],80)
    unrating_dict[arguments[1]]=makeDiv(arguments[1],unrating[arguments[1]].name,unrating[arguments[1]].image,80,score-1)
}
function set_init() {
    try {
        score=arguments[0]+1
        document.getElementById('rating_'+arguments[1]).innerHTML=getScore(arguments[0],arguments[1],80)
    }
    catch (e) {
        console.log(e)
    }
}
function refresh() {
    foods={}
    if(lim===src.length) {
        ratingIdx=0
    }
    document.getElementById('scroll_layout').innerHTML=rating_placeHolder
    if((ratingIdx+20)>=src.length) {
        lim=src.length
    }
    else {
        lim=ratingIdx+20
    }
    let inner=''
    if(rating_info.length===0) {
        for(let i=ratingIdx;i<lim;i++) {
            foods[src[i][0]]=src[i][1]
            inner+=makeDiv(src[i][0],src[i][1],src[i][2],80,-1)
        }
        document.getElementById('scroll_layout').innerHTML=inner
        document.getElementById('scroll_layout').innerHTML+=loading
    }
    else {
        for(let i=ratingIdx;i<lim;i++) {
            foods[src[i][0]]=src[i][1]
            inner+=makeDiv(0,src[i][0],src[i][1],src[i][2],80,-1)
        }
        document.getElementById('scroll_layout').innerHTML=inner
        let foodKeys=Object.keys(foods)
        for(let i=0;i<foodKeys.length;i++) {

            if(rating_info_json[foodKeys[i]]!==undefined) {
                set_init((rating_info_json[foodKeys[i]].rating)-1,foodKeys[i])
            }
        }
        document.getElementById('scroll_layout').innerHTML+=loading
    }
    ratingIdx+=20
}
async function read_more() {
    let inner=``
    if (lim === unrating_keys.length) {
        document.getElementById('loading').innerHTML=`
                    <div style="display: inline-block; margin: auto;">
                        <span>더 이상 불러올 음식이 없어요</span>
                    </div>
                    `
        return
    }
    if((ratingIdx+20)>=unrating_keys.length) {
        lim=unrating_keys.length
    }
    else {
        lim=ratingIdx+20
    }
    for(let i=0;i<lim;i++) {
        inner+=unrating_dict[unrating_keys[i]]
    }
    inner+=loading
    document.getElementById('scroll_layout').innerHTML=inner
    ratingIdx+=20
}
function show_foodinfo() {
    let info=unrating[arguments[0]]
    trait_info=traits[arguments[0]]
    if(flag===false) {
        document.getElementById('food-info').innerHTML=`
                    <div class="card-body" id="title">
                        <div class="box" style="margin: auto">
                            <img class="profile" id="food-info-image" src="${info.image}" alt="..."/>
                        </div>
                        <h1 class="card-title" id="food-name">${info.name}</h1>
                        <p class="card-text" id="food-traits">예상 점수 ${info.predict}</p>
                    </div>
                    `
    }
    else {
        //foodInfo(arguments[0],rating_info_json[arguments[0]])
    }
}