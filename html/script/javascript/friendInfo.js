function getScore() {
    let height=parseInt(arguments[1])
    let width=parseInt(arguments[1])/2
    switch (parseInt(arguments[0])) {
        case 1:
            return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
        case 2:
            return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
        case 3:
            return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
        case 4:
            return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
        case 5:
            return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
        case 6: return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
        case 7: return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
        case 8: return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
        case 9: return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
        case 10: return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">`
        default:
            break
    }
}
async function init() {
    const info=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/JSONHandler.php',
        data: {
            'path':'/var/www/html/database/user_tastes.json'
        }}))
    const info_keys=Object.keys(info)
    if(info_keys.includes(String(friendId)+'-'+String(userId))) {
        combi=String(friendId)+'-'+String(userId)
    }
    else {
        combi=String(userId)+'-'+String(friendId)
    }
    const tastes_diff_path=`http://ssossotable.com/config/userTastes/${combi}.png`

    document.getElementById('taste-diff-list').innerHTML=`<img id="taste-image" src="${tastes_diff_path}" style="width: 100%!important; height: fit-content!important;"/>`

    const high_rating=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data: {
            0:'select',
            1:'food.id,food.name,user.image,food.image,rating,user.nickname',
            2:'user,food,rating',
            3:`user.id=${friendId} and rating >= 8 and food.id=rating.foodid and user.id=rating.userid;`
        }}))
    const low_rating=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data: {
            0:'select',
            1:'food.id,food.name,user.image,food.image,rating,user.nickname',
            2:'user,food,rating',
            3:`user.id=${friendId} and rating < 6 and food.id=rating.foodid and user.id=rating.userid;`
        }}))

    nickname=high_rating[0][5]

    document.getElementById('nickname').innerText=nickname

    document.getElementById('myFoodModalLabel').innerText=nickname+'님의 취향'

    document.getElementById('high-rating-holder').innerHTML=''
    document.getElementById('low-rating-holder').innerHTML=''

    document.getElementById('user-image').src=high_rating[0][2]

    for(let i=0; i <high_rating.length;i++) {
        let high_div=
            `<div class="high-rating-layout">
                        <div>
                            <div class="box" style="height: 80px; width: 80px;">
                                <img class="profile" src="${high_rating[i][3]}">
                            </div>
                        </div>
                        <span style="display: block;">${high_rating[i][1]}</span>
                        <span>${getScore(high_rating[i][4],10)}</span>
                        </div>`
        document.getElementById('high-rating-holder').innerHTML+=high_div
    }
    for(let i=0; i <low_rating.length;i++) {
        let low_div=
            `<div class="high-rating-layout">
                        <div>
                            <div class="box" style="height: 80px; width: 80px;">
                                <img class="profile" src="${low_rating[i][3]}">
                            </div>
                        </div>
                        <span style="display: block;">${low_rating[i][1]}</span>
                        <span>${getScore(low_rating[i][4],10)}</span>
                        </div>`
        document.getElementById('low-rating-holder').innerHTML+=low_div
    }
    const v=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data: {
            0:'select',
            1:'userid,foodid,rating,name,image',
            2:'rating,food',
            3:`rating.userid=${friendId} and rating.foodid=food.id;`
        }}))
    let rating_divs=``
    let rating_stars=``
    for(let j=0;j<v.length;j++) {
        const rate=parseInt(v[j][2])
        rating_stars=getScore(rate,40)
        rating_divs+=`
                    <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                    <div style="display: inline-block; margin: 0;">
                    <div>
                        <div class="box" style="height: 80px; width: 80px;">
                            <img class="profile" src="${v[j][4]}">
                        </div>
                    </div>
                    </div>
                    <div style="width:300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content">
                    <div class="d-flex justify-content-start fs-3" style="">
                        <span class="col-10">${v[j][3]}</span>
                    </div>
                    ${rating_stars}
                    </div>
                    </div>`
    }
    document.getElementById('scroll-layout-rating').innerHTML=rating_divs
}
function toFriendDiary() {
    let form = document.createElement("form");

    form.setAttribute("type", "hidden");
    form.setAttribute("id",`friend-info-${friendId}`)
    form.setAttribute("action","friend_diary.php")
    form.setAttribute("method","post")

    let input = document.createElement("input")

    input.setAttribute("type", "hidden");
    input.setAttribute("name", "friendId");
    input.setAttribute("value", friendId);

    form.appendChild(input)
    document.getElementById(`rating`).appendChild(form)

    document.getElementById(`friend-info-${friendId}`).submit()
}