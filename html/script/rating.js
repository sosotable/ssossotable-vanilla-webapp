function getScore() {
    let width=parseInt(arguments[2])/2
    let height=parseInt(arguments[2])
    switch (parseInt(arguments[0])) {
        case 0:
            return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},false)">`
        case 1:
            return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},false)">`
        case 2:
            return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},false)">`
        case 3:
            return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},false)">`
        case 4:
            return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},false)">`
        case 5: return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},false)">`
        case 6: return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},false)">`
        case 7: return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},false)">`
        case 8: return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},false)">`
        case 9: return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},false)">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},true)"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},false)">`
        default:
            break
    }
}
function makeDiv() {
    let width=parseInt(arguments[3])/2
    let height=parseInt(arguments[3])
    return `
          <div onclick="show_foodinfo(${arguments[0]});" style="height: 100%;" class="list-group-item list-group-item-action py-3 lh-tight d-flex food-list" aria-current="true" id="${arguments[0]}">
                <div class="rating-image" id="img_${arguments[0]}" style="height:160px; width:160px;" onclick="foodInfo(${arguments[0]})" class="food-image">
                    <div class="box" style="height:120px; width:120px; margin: 0;"><img class="profile" src="${arguments[2]}"></div>
                </div>
                <div style="width: 100%; display: inline-block; margin: 0 0 0 20px;" class="rating_content" id="content_${arguments[0]}">
                    <div class="d-flex justify-content-between fs-3" style="font-size: 25px; margin: 0px !important; padding: 0px !important;" class="food-name">
                        <span>${arguments[1]}</span>
                        <span id="predict-${arguments[0]}" class="food-predict">예상 점수: ${foods[arguments[0]].predict}</span>
                    </div>
                    <div class="d-flex justify-content-start fs-2 food-rating" id="rating_${arguments[0]}" style=" margin: 0px !important; padding: 0px !important;">
                        <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[0]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[0]},false)">
                        <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[0]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[0]},false)">
                        <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[0]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[0]},false)">
                        <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[0]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[0]},false)">
                        <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[0]},true)"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[0]},false)">
                    </div>
                </div>
            </div>`

}

function set_rating() {
    document.getElementById('predict-'+arguments[0]).classList.add('predict-disable')
    document.getElementById(`rating_${arguments[0]}`).innerHTML=getScore(arguments[1],arguments[2],80)
}
async function init() {
    if(mql.matches) {
        // 모바일
        flag=true
        document.getElementById('rating').classList.remove('justify-content-center')
        document.getElementById('food-info').style.cssText=`width: 100%; height: 100%; display:none;`
    }
    else {
        // 데스크톱
        flag=false
        document.getElementById('rating').classList.add('justify-content-center')
        document.getElementById('food-info').style.cssText=`width: 100%; height: 100%;`
    }
    userProfile.userId=id
    init_traits=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data:{
            0:'select',
            1:"*",
            2:"trait",
            3:`1>0`
        }}))
    traits={}
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


    let info=await $.ajax({type: "GET", url: '/script/get_user_profile_lasso.php'})
    info=JSON.parse(info)
    let keys=Object.keys(info)

    for(let i=0; i < keys.length; i++) {
        userProfile[keys[i]]=info[keys[i]][userProfile.userId]
    }

    let inner=''
    rating_info=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data:{
            0:'select',
            1:"food.id, name, image, userid, rating",
            2:"food,rating",
            3:`food.id=rating.foodid and userid=${id};`
        }}))
    src=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data: {
            0:'select',
            1:"*",
            2:"food",
            3:`1>0;`
        }}))
    if(rating_info.length===0) {
        for(let i=0;i<src.length;i++) {
            trait_info=traits[src[i][0]]
            let ex_rating=userProfile['intercept']
            for(let i=0;i<trait_keys.length;i++) {
                let trait_name=trait_keys[i]
                if(parseInt(trait_info[trait_name])===1) {
                    ex_rating+=userProfile[trait_name]
                }
            }
            ex_rating=(ex_rating/2).toFixed(1)
            foods[src[i][0]]={
                name:src[i][1],
                image:src[i][2],
                predict:ex_rating
            }
            rating_dict[src[i][0]]=makeDiv(src[i][0],src[i][1],src[i][2],80)
        }
    }
    else {
        for(let i=0;i<rating_info.length;i++) {
            rating_info_json[rating_info[i][0]]={
                name:rating_info[i][1],
                image:rating_info[i][2],
                userId:rating_info[i][3],
                rating:rating_info[i][4]
            }
        }
        keys=Object.keys(rating_info_json)
        for(let i=0;i<src.length;i++) {
            trait_info=traits[src[i][0]]
            let ex_rating=userProfile['intercept']
            for(let i=0;i<trait_keys.length;i++) {
                let trait_name=trait_keys[i]
                if(parseInt(trait_info[trait_name])===1) {
                    ex_rating+=userProfile[trait_name]
                }
            }
            ex_rating=(ex_rating/2).toFixed(1)
            foods[src[i][0]]={
                name:src[i][1],
                image:src[i][2],
                predict:ex_rating
            }
            rating_dict[src[i][0]]=makeDiv(src[i][0],src[i][1],src[i][2],80)
        }
        for(let i=0;i<keys.length;i++) {
            let obj=rating_info_json[keys[i]]
        }
    }
    let rating_dict_keys=Object.keys(rating_dict)
    for(let i=0;i<rating_dict_keys.length;i++) {
        inner+=rating_dict[rating_dict_keys[i]]
    }
    document.getElementById('scroll_layout').innerHTML=inner
    for(let i=0;i<keys.length;i++) {
        let obj=rating_info_json[keys[i]]
        set_rating(keys[i],obj.rating-1,keys[i])
    }

    document.getElementById('scroll_layout').innerHTML+=loading
    rating_list=document.getElementsByClassName('food-list')

    for(let i=20;i<rating_list.length;i++) {
        rating_list[i].style.cssText = "height: 140px; display: none!important";
    }
    ratingIdx+=20
}
async function foodInfo() {
    const name=rating_info_json[arguments[0]]
    if(flag===false) {
    }
    else {
        var form = document.createElement("form");

        form.setAttribute("type", "hidden");
        form.setAttribute("id","food-info")
        form.setAttribute("action","foodinfo.php")
        form.setAttribute("method","post")

        var input = document.createElement("input")

        input.setAttribute("type", "hidden");
        input.setAttribute("name", "foodid");
        input.setAttribute("value", JSON.stringify(name));

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
    document.getElementById('rating_' + arguments[1]).innerHTML = getScore(arguments[0], arguments[1], 80)
    document.getElementById('desktop-rating-info').innerHTML = getScore(arguments[0], arguments[1], 100)
}
function set_init() {
    try {
        score=arguments[0]+1
        document.getElementById('rating_'+arguments[1]).innerHTML=getScore(arguments[0],arguments[1],80)
        console.log('aa')
        console.log(document.getElementById('predict-'+arguments[1]).classList)
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
            inner+=makeDiv(src[i][0],src[i][1],src[i][2],80)
        }
        document.getElementById('scroll_layout').innerHTML=inner
        document.getElementById('scroll_layout').innerHTML+=loading
    }
    else {
        for(let i=ratingIdx;i<lim;i++) {
            foods[src[i][0]]=src[i][1]
            inner+=makeDiv(src[i][0],src[i][1],src[i][2],80)
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
    if (lim === rating_list.length) {
        document.getElementById('loading').innerHTML=`
                    <div style="display: inline-block; margin: auto;">
                        <span>더 이상 불러올 음식이 없어요</span>
                    </div>
                    `
    }
    if((ratingIdx+20)>=src.length) {
        lim=rating_list.length
    }
    else {
        lim=ratingIdx+20
    }
    for(let i=0;i<lim;i++) {
        rating_list[i].style.cssText = "height: 100%; display: flex!important";
    }
    ratingIdx+=20
}
function show_foodinfo() {
    let s_fmt=``
    let idx=parseInt(arguments[0])
    let info=foods[idx]

    trait_info=traits[idx]
    let ex_rating=userProfile['intercept']
    for(let i=0;i<trait_keys.length;i++) {
        let trait_name=trait_keys[i]
        if(parseInt(trait_info[trait_name])===1) {
            ex_rating+=userProfile[trait_name]
        }
    }
    ex_rating=(ex_rating/2).toFixed(1)
    if(rating_info_json.hasOwnProperty(idx)) {
        rating=rating_info_json[idx].rating-1
        s_fmt=getScore(rating, arguments[0],100)
    }

    else {
        s_fmt=`
        <h3><span>예상 점수: ${info.predict}점</span></h3>
        `
    }

    if(flag===false) {
        let format=`
                    <div class="card-body" id="title">
                        <div class="box" style="height:360px; width:360px;">
                            <img class="profile" id="food-info-image" src="${info.image}" />
                        </div>
                        <h1 class="card-title" id="food-name">${info.name}</h1>
                        <p class="card-text" id="food-traits">특성 목록</p>
                        <div id="desktop-rating-info" style="margin-bottom: 50px;">
                            ${s_fmt}
                        </div>
                    </div>
                    `
        document.getElementById('food-info').innerHTML=format
    }
    else {
        //foodInfo(arguments[0],rating_info_json[arguments[0]])
    }
}