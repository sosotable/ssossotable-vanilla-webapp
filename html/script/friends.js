async function init() {
    if (mql.matches) {
        // 모바일
        flag = true
        document.getElementById('friend-info-left').style.cssText='display:none!important'
        document.getElementById('friend-info-right').style.cssText='display:none!important'
        document.getElementById('friend-layout').style.cssText=`
            padding: 0!important;
            margin: 0!important;
            width: 100%!important;
        `
    } else {
        // 데스크톱
        flag = false
    }
    let div=`<div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="코드 입력" aria-label="Recipient's username" aria-describedby="button-addon2" id="friendInputInfo">
                <button class="btn btn-outline-secondary" type="button" value="친구 추가" onclick="searchFriend()" data-bs-toggle="modal" data-bs-target="#friendSearchModal">Button</button>
            </div>`
    let modal=``
    let rating=``

    let v=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data:{
            0:'select',
            1:'id,nickname,image',
            2:'user',
            3:`id in (select friendid from user,friend where friend.userid=${id} and user.id = friend.userid);`
        }}))

    for(let i=0;i<v.length;i++) {
        userIds.push(v[i][0])
        friendInfo[v[i][0]]={}
        friendInfo[v[i][0]].nickname=v[i][1]
        friendInfo[v[i][0]].image=v[i][2]
        div+=`
                <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true" onclick="toFriendInfo(${v[i][0]},'${v[i][1]}');" id="friend-${v[i][0]}">
                    <div class="img-box" style="display: inline-block; margin: 0;">
                        <img id="img-${v[i][0]}" class="friend-img" src="${v[i][2]}" height="80" width="80">
                    </div>
                    <div style="width:300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content">
                        <div class="placeholder-glow d-flex justify-content-start fs-3" id="nickname-${v[i][0]}">
                            <span>${v[i][1]}</span>
                        </div>
                        <div class="placeholder-glow d-flex justify-content-start fs-2" style="margin:10px 0 0 0" id="relationship-${v[i][0]}">
                            <span>Relationship</span>
                        </div>
                    </div>
                </div>`
    }
    document.getElementById("friend-layout").innerHTML=div
}


async function toFriendInfo() {
    if(flag) {
        let form = document.createElement("form");

        form.setAttribute("type", "hidden");
        form.setAttribute("id",`friend-info-{${arguments[0]}}`)
        form.setAttribute("action","friendInfo.php")
        form.setAttribute("method","post")

        let input = document.createElement("input")

        input.setAttribute("type", "hidden");
        input.setAttribute("name", "friendId");
        input.setAttribute("value", arguments[0]);

        form.appendChild(input)
        document.getElementById(`friend-${arguments[0]}`).appendChild(form)

        document.getElementById(`friend-info-{${arguments[0]}}`).submit()
    }
    else {
        document.getElementById('friend-nickname').innerHTML=arguments[1]
        const friendInfo=JSON.parse(await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0:'select',
                1:'*',
                2:'user',
                3:`user.id=${arguments[0]}`
            }}))
        document.getElementById('friend-image').src=friendInfo[0][4]
        const high_rating=JSON.parse(await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0:'select',
                1:'food.id,food.name,user.image,food.image,rating,user.nickname',
                2:'user,food,rating',
                3:`user.id=${arguments[0]} and rating >= 8 and food.id=rating.foodid and user.id=rating.userid;`
            }}))
        const low_rating=JSON.parse(await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0:'select',
                1:'food.id,food.name,user.image,food.image,rating,user.nickname',
                2:'user,food,rating',
                3:`user.id=${arguments[0]} and rating < 6 and food.id=rating.foodid and user.id=rating.userid;`
            }}))
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
        let ratingInfoPath=`http://ssossotable.com/config/ratingInfos/${arguments[0]}.png`
        document.getElementById('taste-list').innerHTML=`<img src="${ratingInfoPath}">`
    }

}
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