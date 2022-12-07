
async function init() {
    flag = !!mql.matches;
}

async function add_menu() {
    let idx=-1
    let option=null
    let menuname
    let radio
    let v,id=null
    let foodid=-1
    let rating_rate
    const ts=Date.now()
    const d=new Date()
    console.log(d.getUTCMonth())
    console.log(d.getUTCMonth())
    const time_format=`
            ${d.getFullYear()}.${d.getMonth()+1}.${d.getDay()}
            `
    if(flag) {
        menuname=document.getElementById("menu-name-mobile").value;
        radio=document.querySelectorAll("input[class='form-check-input-mobile']")
        for(let i=0;i<radio.length;i++) {
            if(radio[i].checked) {
                idx=i
                radio[i].checked=false
            }
        }
        switch (idx) {
            case 0: option='나쁨'; rating_rate=1; break;
            case 1: option='보통'; rating_rate=6; break;
            case 2: option='좋음'; rating_rate=10; break;
        }
        if(idx !== -1) {

            let v=JSON.parse(await $.ajax({
                type: "POST",
                url: '/script/php/DAOHandler.php',
                data:{
                    0:'select',
                    1:'id',
                    2:"food",
                    3:`name='${menuname}'`
                }}))
            if(v.length===0) {
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data:{
                        0:'insert',
                        1:'food(name)',
                        2:`'${menuname}'`
                    }})
                id=JSON.parse(await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data:{
                        0:'select',
                        1:'id',
                        2:"food",
                        3:`1>0 order by id desc limit 1`
                    }}))
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data:{
                        0:'insert',
                        1:'trait(id)',
                        2:`'${id[0][0]}'`
                    }})
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data:{
                        0:'insert',
                        1:'meal(foodid,userid,locationid,rating)',
                        2:`'${id[0][0]}',${userId},${placeId},${idx}`
                    }})
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data:{
                        0:'insert',
                        1:'meal(foodid,userid,locationid,rating)',
                        2:`'${id[0][0]}',${userId},${placeId},${idx}`
                    }})
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data:{
                        0:'insert',
                        1:'meal_rating(userid,foodid,rating)',
                        2:`${userId},${id[0][0]},${rating_rate}`
                    }})
            }
            else {
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data:{
                        0:'insert',
                        1:'meal(foodid,userid,locationid,rating)',
                        2:`'${v[0][0]}',${userId},${placeId},${idx}`
                    }})
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data:{
                        0:'insert',
                        1:'meal_rating(userid,foodid,rating)',
                        2:`${userId},${v[0][0]},${rating_rate}`
                    }})
            }
            document.getElementById("menu-name-mobile").value=''
            document.getElementById('menu-list-mobile').innerHTML+=`
                    <li id="${menuname}" class="list-group-item menus d-flex justify-content-between">
                        <div class="menus-info-div">
                            <span class="menu-content">${menuname}</span>
                            <span class="menu-content time">${time_format}</span>
                        </div>
                        <span class="menu-content">${option}</span>
                        <img class="menu-content-image" onclick="delete_menu('${menuname}')" src="src/close.png" alt="...">
                    </li>
                    `

        }
    }
    else {
        menuname=document.getElementById("menu-name").value;
        radio=document.querySelectorAll("input[class='form-check-input']")
        for(let i=0;i<radio.length;i++) {
            if(radio[i].checked) {
                idx=i
                radio[i].checked=false
            }
        }
        switch (idx) {
            case 0: option='나쁨';break;
            case 1: option='보통';break;
            case 2: option='좋음';break;
        }
        if(idx !== -1) {
            v=JSON.parse(await $.ajax({
                type: "POST",
                url: '/script/php/DAOHandler.php',
                data:{
                    0:'select',
                    1:'id',
                    2:"food",
                    3:`name='${menuname}'`
                }}))
            if(v.length===0) {
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data:{
                        0:'insert',
                        1:'food(name)',
                        2:`'${menuname}'`
                    }})
                id=JSON.parse(await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data:{
                        0:'select',
                        1:'id',
                        2:"food",
                        3:`1>0 order by id desc limit 1`
                    }}))
                foodid=id[0][0]
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data:{
                        0:'insert',
                        1:'trait(id)',
                        2:`'${foodid}'`
                    }})
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data:{
                        0:'insert',
                        1:'meal(foodid,userid,locationid,rating)',
                        2:`'${foodid}',${userId},${placeId},${idx}`
                    }})
            }
            else {
                foodid=v[0][0]
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data:{
                        0:'insert',
                        1:'meal(foodid,userid,locationid,rating)',
                        2:`'${v[0][0]}',${userId},${placeId},${idx}`
                    }})
            }

            document.getElementById("menu-name").value=''
            document.getElementById('menu-list').innerHTML+=`
                <li id="${menuname}" class="list-group-item menus d-flex justify-content-between">
                    <div>
                        <span class="menu-content">${menuname}</span>
                        <span class="menu-content time">${time_format}</span>
                    </div>
                    <span class="menu-content">${option}</span>
                    <img class="menu-content-image" onclick="delete_menu('${menuname}')" src="src/close.png" alt="...">
                </li>
                `
        }
    }

}
async function delete_menu() {
    let children
    if(flag) {
        children=document.getElementById('menu-list-mobile').children
    }
    else {
        children=document.getElementById('menu-list').children
    }
    for(let i=0;i<children.length;i++) {
        if(children[i].id===`${placeId}-`+arguments[0]) {
            children[i].remove()
            await $.post("script/php/DAOHandler.php",
                {
                    0:'delete',
                    1:'meal',
                    2:`userid=${userId} and foodid=${arguments[0]} and locationid=${placeId}`
                })
        }
    }

}
function close_place_info() {
    document.getElementById('place-info').style.display='none'
    document.getElementById('record-map').style.height='100%'
    document.getElementById('search-info').style.display='block'
}
async function add_menu_count() {
    let cnt=parseInt(menus[arguments[0]].count)+1
    menus[arguments[0]].count=cnt
    let children=document.getElementById(`${placeId}-${arguments[0]}`).children
    children[1].innerText=String(cnt)

    await $.post("script/php/DAOHandler.php",
        {
            0:'insert',
            1:'meal(foodid,userid,locationid,rating)',
            2:`${arguments[0]},${userId},${placeId},${menus[arguments[0]].rating_int}`
        })
}