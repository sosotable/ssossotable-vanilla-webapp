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
    let width=parseInt(arguments[2])/2
    let height=parseInt(arguments[2])
    return `
          <div onclick="show_foodinfo(${arguments[0]});" style="height: 140px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center food-list" aria-current="true" id="${arguments[0]}">
                <div class="rating-image" id="img_${arguments[0]}" style="display: inline-block; margin: 0;" class="food-image">
                    <img src="/src/ramen.jpg" height="120" width="120">
                </div>
                <div style="width: 300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content" id="content_${arguments[0]}">
                    <div class="d-flex justify-content-start fs-3" style="font-size: 25px; margin: 0px !important; padding: 0px !important;" class="food-name">
                        <span>${arguments[1]}</span>
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
    document.getElementById(`rating_${arguments[0]}`).innerHTML=getScore(arguments[1],arguments[2],80)
}
async function init() {
    if(mql.matches) {
        flag=true
        //document.getElementById('nav').classList.remove('fixed-top')
        //document.getElementById('footer').classList.remove('fixed-bottom')
        document.getElementById('rating').classList.remove('justify-content-center')
        document.getElementById('food-info').style.cssText=`width: 100%; height: 100%; display:none;`
    }
    else {
        flag=false
        //document.getElementById('nav').classList.add('fixed-top')
        //document.getElementById('footer').classList.add('fixed-bottom')
        document.getElementById('rating').classList.add('justify-content-center')
        document.getElementById('food-info').style.cssText=`width: 100%; height: 100%;`
    }
    console.log(flag)
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
            foods[src[i][0]]=src[i][1]
            rating_dict[src[i][0]]=makeDiv(src[i][0],src[i][1],80)
        }
    }
    else {
        for(let i=0;i<rating_info.length;i++) {
            rating_info_json[rating_info[i][0]]={
                name:rating_info[i][1],
                userId:rating_info[i][3],
                rating:rating_info[i][4]
            }
        }
        keys=Object.keys(rating_info_json)
        for(let i=0;i<src.length;i++) {
            foods[src[i][0]]=src[i][1]
            rating_dict[src[i][0]]=makeDiv(src[i][0],src[i][1],80)
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

    var form = document.createElement("form");

    form.setAttribute("type", "hidden");
    form.setAttribute("id","food-info")
    form.setAttribute("action","foodinfo.php")
    form.setAttribute("method","post")

    var input = document.createElement("input")

    input.setAttribute("type", "hidden");
    input.setAttribute("name", "foodid");
    input.setAttribute("value", JSON.stringify(arguments[1]));

    form.appendChild(input)
    document.getElementById(`img_${arguments[0]}`).appendChild(form)

    document.getElementById("food-info").submit()

}

async function set() {
    score=arguments[0]+1
    let set_info=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data: {
            0:'select',
            1:'*',
            2:'rating',
            3:`userid=${id} and foodid=${arguments[1]};`
        }}))

    if(set_info.length>0) {
        await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0:'update',
                1:'rating',
                2:`rating=${score}`,
                3:`userid=${id} and foodid=${arguments[1]};`
            }})
    }
    else {
        await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0:'insert',
                1:'rating(userid,foodid,rating)',
                2:`${id},${arguments[1]},${score}`
            }})
    }
    document.getElementById('rating_'+arguments[1]).innerHTML=getScore(arguments[0],arguments[1],80)
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
            inner+=makeDiv(src[i][0],src[i][1],80)
        }
        document.getElementById('scroll_layout').innerHTML=inner
        document.getElementById('scroll_layout').innerHTML+=loading
    }
    else {
        for(let i=ratingIdx;i<lim;i++) {
            foods[src[i][0]]=src[i][1]
            inner+=makeDiv(src[i][0],src[i][1],80)
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