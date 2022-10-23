async function init() {
    let postJson={}
    let div=``
    let modal=``
    let rating=``

    postJson[0]=2
    postJson[1]='id,nickname,image'
    postJson[2]='user'
    postJson[3]=`id in (select friendid from user,friend where friend.userid=${id} and user.id = friend.userid);`
    let v=JSON.parse(await $.post("script/php/DAOHandler.php",postJson))

    for(let i=0;i<v.length;i++) {
        userIds.push(v[i][0])
        friendInfo[v[i][0]]={}
        friendInfo[v[i][0]].nickname=v[i][1]
        friendInfo[v[i][0]].image=v[i][2]
        div+=`
                <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true" onclick="toFriendInfo(${v[i][0]});" id="friend-${v[i][0]}">
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
    document.getElementById("friend_layout").innerHTML=div
}


function toFriendInfo() {
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