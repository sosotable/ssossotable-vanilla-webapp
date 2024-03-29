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
                        <img id="img-${v[i][0]}" class="friend-img" src="${v[i][2]}" height="80" width="80" alt="...">
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

    search_res=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data: {
            0:'select',
            1:'userid,id,image,nickname',
            2:`friend_request,user`,
            3:`\`to\`=${id} and friend_request.\`from\`=user.id;`
        }}))
    if(search_res.length===0) {
        document.getElementById('friend-request-notification').src='src/notification.png'
        document.getElementById('friend-request').innerHTML=`<span>친구 요청이 없어요</span>`
    }
    else {
        for(let i=0;i<search_res.length;i++) {
            request_format+=`
                    <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                        <div class="img-box" style="display: inline-block; margin: 0;">
                            <img class="friend-request-img" src="${search_res[i][2]}" height="80" width="80" alt="...">
                        </div>
                        <div style="width:300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content">
                            <div class="d-flex justify-content-start fs-3" style="">
                                <span class="col-5">${search_res[i][3]}</span>
                            </div>
                            <div class="request-friend-layout d-flex" class="placeholder-glow d-flex justify-content-start fs-2" style="margin:10px 0 0 0" onclick="accept_request(${search_res[i][1]})">
                                <input id='request-friend-button-${search_res[i][1]}' class="btn col-6 btn-outline-success" type="button" value="수락하기" >
                            </div>
                        </div>
                    </div>
                    `
        }
        document.getElementById('friend-request-notification').src='src/notification_on.png'
        document.getElementById('friend-request').innerHTML=request_format
    }
}
async function toFriendInfo() {
    if(flag) {
        let form = document.createElement("form");

        form.setAttribute("type", "hidden");
        form.setAttribute("id",`friend-info-${arguments[0]}`)
        form.setAttribute("action","friend_info.php")
        form.setAttribute("method","post")

        let input = document.createElement("input")

        input.setAttribute("type", "hidden");
        input.setAttribute("name", "friendId");
        input.setAttribute("value", arguments[0]);

        form.appendChild(input)
        document.getElementById(`friend-${arguments[0]}`).appendChild(form)

        document.getElementById(`friend-info-${arguments[0]}`).submit()
    }
    else {
        let combi
        document.getElementById('friend-nickname').innerHTML=arguments[1]
        const info=JSON.parse(await $.ajax({
            type: "POST",
            url: '/script/php/JSONHandler.php',
            data: {
                'path':'/var/www/html/database/user_tastes.json'
            }}))
        const info_keys=Object.keys(info)
        if(info_keys.includes(String(arguments[0])+'-'+String(userId))) {
            combi=String(arguments[0])+'-'+String(userId)
        }
        else {
            combi=String(userId)+'-'+String(arguments[0])
        }
        const tastes_diff_path=`http://ssossotable.com/config/userTastes/${combi}.png`
        const friendInfo=JSON.parse(await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0:'select',
                1:'*',
                2:'user',
                3:`user.id=${arguments[0]}`
            }}))
        friendId=friendInfo[0][1]
        console.log(friendId)
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
        document.getElementById('high-rating-holder').innerHTML=``
        document.getElementById('low-rating-holder').innerHTML=``
        for(let i=0; i <high_rating.length;i++) {
            let high_div=
                `<div class="high-rating-layout">
                    <div>
                        <div class="box" style="height: 80px; width: 80px;">
                            <img class="profile" src="${high_rating[i][3]}" alt="...">
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
                            <img class="profile" src="${low_rating[i][3]}" alt="...">
                        </div>
                    </div>
                    <span style="display: block;">${low_rating[i][1]}</span>
                    <span>${getScore(low_rating[i][4],10)}</span>
                </div>`
            document.getElementById('low-rating-holder').innerHTML+=low_div
        }
        let ratingInfoPath=`http://ssossotable.com/config/ratingInfos/${arguments[0]}.png`
        document.getElementById('taste-list').innerHTML=`<img src="${ratingInfoPath}" alt="...">`
        document.getElementById('taste-diff-list').innerHTML=`<img src="${tastes_diff_path}" alt="...">`

        const v=JSON.parse(await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0:'select',
                1:'userid,foodid,rating,name,image',
                2:'rating,food',
                3:`rating.userid=${arguments[0]} and rating.foodid=food.id;`
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
                            <img class="profile" src="${v[j][4]}" alt="...">
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

}
function getScore() {
    let height=parseInt(arguments[1])
    let width=parseInt(arguments[1])/2
    switch (parseInt(arguments[0])) {
        case 1:
            return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">`
        case 2:
            return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">`
        case 3:
            return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">`
        case 4:
            return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">`
        case 5:
            return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">`
        case 6: return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">`
        case 7: return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">`
        case 8: return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">`
        case 9: return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="...">`
        case 10: return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..."><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="...">`
        default:
            break
    }
}
async function searchFriend() {
    let userInfo=document.getElementById("friendInputInfo").value
    let friends_info

    if(isNaN(userInfo)) {
        friends_info=JSON.parse(await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0:'select',
                1:'*',
                2:'user',
                3:`nickname='${userInfo}' and id != ${id} and id not in (select friendid from friend where userid=${id});`
            }}))
    }
    else {
        friends_info=JSON.parse(await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0:'select',
                1:'*',
                2:'user',
                3:`(userid=${userInfo}) and id != ${id} and id not in`+
                    `(select friendid from friend where userid=${id});`
            }}))
    }


    if(friends_info.length!==0) {
        friendAddInfo.friendId=friends_info[0][1]
        friendId=friends_info[0][1]
        document.getElementById("friend-modal-body").innerHTML=`
                <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                    <div class="img-box" style="display: inline-block; margin: 0;">
                        <img class="friend-img" src="${friends_info[0][4]}" height="80" width="80" alt="...">
                    </div>
                    <div style="width:300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content">
                        <div class="d-flex justify-content-start fs-3" style="">
                            <span class="col-5">${friends_info[0][6]}</span>
                        </div>
                        <div class="placeholder-glow d-flex justify-content-start fs-2 add-friend-layout" style="margin:10px 0 0 0" onclick="friend_request(${friendId})">
                            <input id="add-friend-button-${friendId}" type="button" class="btn col-6 btn-outline-success" value="친구 요청" >
                        </div>
                    </div>
                </div>
                `
    }
}
async function friend_request() {
    await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data: {
            0:'insert',
            1:'friend_request(`from`,`to`)',
            2:`${id},${arguments[0]}`
        }})
    if(document.getElementById(`add-friend-button-${arguments[0]}`).disabled===false) {
        document.getElementById(`add-friend-button-${arguments[0]}`).disabled=true
        document.getElementById(`add-friend-button-${arguments[0]}`).value="친구 추가됨"
    }
    else {
        document.getElementById(`add-friend-button-${arguments[0]}`).disabled=false
        document.getElementById(`add-friend-button-${arguments[0]}`).value="친구 추가"
    }

    location.reload()
}
async function accept_request() {
    if(document.getElementById(`request-friend-button-${arguments[0]}`).disabled===false) {
        await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0:'insert',
                1:'friend(userid,friendid)',
                2:`${id}, ${arguments[0]}`
            }})
        await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0:'delete',
                1:'friend_request',
                2:`\`from\`=${arguments[0]} and \`to\`=${id}`
            }})
        document.getElementById(`request-friend-button-${arguments[0]}`).disabled=true
        document.getElementById(`request-friend-button-${arguments[0]}`).value="친구 추가됨"

    }
    else {
        document.getElementById(`request-friend-button-${arguments[0]}`).disabled=false
        document.getElementById(`request-friend-button-${arguments[0]}`).value="친구 추가"
    }
    location.reload()
}
async function show_diary() {
    let form = document.createElement("form");

    form.setAttribute("type", "hidden");
    form.setAttribute("id",`friend-diary-${friendId}`)
    form.setAttribute("action","friend_diary.php")
    form.setAttribute("method","post")

    let input = document.createElement("input")

    input.setAttribute("type", "hidden");
    input.setAttribute("name", "friendId");
    input.setAttribute("value", friendId);

    form.appendChild(input)
    document.getElementById(`relationship-${friendId}`).appendChild(form)
    document.getElementById(`friend-diary-${friendId}`).submit()
}