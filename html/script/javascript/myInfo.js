function getScore() {
    let height=parseInt(arguments[1])
    let width=parseInt(arguments[1])/2
    switch (parseInt(arguments[0])) {
        case 1:
            return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(0,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(1,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(2,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(3,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(4,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(5,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(6,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(7,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(8,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(9,${arguments[2]})">`
        case 2:
            return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(0,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(1,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(2,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(3,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(4,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(5,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(6,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(7,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(8,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(9,${arguments[2]})">`
        case 3:
            return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(0,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(1,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(2,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(3,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(4,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(5,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(6,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(7,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(8,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(9,${arguments[2]})">`
        case 4:
            return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(0,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(1,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(2,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(3,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(4,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(5,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(6,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(7,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(8,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(9,${arguments[2]})">`
        case 5:
            return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(0,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(1,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(2,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(3,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(4,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(5,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(6,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(7,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(8,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(9,${arguments[2]})">`
        case 6: return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(0,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(1,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(2,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(3,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(4,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(5,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(6,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(7,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(8,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(9,${arguments[2]})">`
        case 7: return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(0,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(1,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(2,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(3,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(4,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(5,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(6,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(7,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(8,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(9,${arguments[2]})">`
        case 8: return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(0,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(1,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(2,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(3,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(4,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(5,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(6,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(7,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(8,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(9,${arguments[2]})">`
        case 9: return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(0,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(1,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(2,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(3,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(4,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(5,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(6,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(7,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(8,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(9,${arguments[2]})">`
        case 10: return `
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(0,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(1,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(2,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(3,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(4,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(5,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(6,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(7,${arguments[2]})">
            <img class="rating-stars" src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" alt="..." onclick="set(8,${arguments[2]})"><img class="rating-stars" src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" alt="..." onclick="set(9,${arguments[2]})">`
        default:
            break
    }
}
async function set() {
    document.getElementById(`rating-set-${arguments[1]}`).innerHTML=getScore(parseInt(arguments[0])+1,40,arguments[1])
    await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data: {
            0:'update',
            1:'rating',
            2:`rating=${parseInt(arguments[0])+1}`,
            3:`userid=${userId} and foodid=${arguments[1]};`
        }})

}
async function init() {
    flag = !!mql.matches;
    const high_rating=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data: {
            0:'select',
            1:'food.id,food.name,user.image,food.image,rating,user.nickname',
            2:'user,food,rating',
            3:`user.id=${userId} and rating >= 8 and food.id=rating.foodid and user.id=rating.userid;`
        }}))
    const low_rating=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data: {
            0:'select',
            1:'food.id,food.name,user.image,food.image,rating,user.nickname',
            2:'user,food,rating',
            3:`user.id=${userId} and rating < 6 and food.id=rating.foodid and user.id=rating.userid;`
        }}))

    document.getElementById('userImage').src=high_rating[0][2]
    document.getElementById('high-rating-holder').innerHTML=''
    document.getElementById('low-rating-holder').innerHTML=''

    for(let i=0; i <high_rating.length;i++) {
        let high_div=
            `<div class="high-rating-layout">
                        <div>
                            <div class="box" style="width: 80px; height: 80px">
                                <img class="profile" src="${high_rating[i][3]}" alt="..."/>
                            </div>
                        </div>

                        <span style="display: block;">${high_rating[i][1]}</span>
                        <span class="rating-stars">${getScore(high_rating[i][4],10)}</span>
                        </div>`
        document.getElementById('high-rating-holder').innerHTML+=high_div
    }
    for(let i=0; i <low_rating.length;i++) {
        let low_div=
            `<div class="high-rating-layout">
                        <div>
                            <div class="box" style="width: 80px; height: 80px">
                                <img class="profile" src="${low_rating[i][3]}" alt="..."/>
                            </div>
                        </div>
                        <span style="display: block;">${low_rating[i][1]}</span>
                        <span class="rating-stars">${getScore(low_rating[i][4],10)}</span>
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
            3:`rating.userid=${userId} and rating.foodid=food.id;`
        }}))

    let rating_divs=``
    let rating_stars=``

    for(let j=0;j<v.length;j++) {
        const rate=parseInt(v[j][2])
        rating_stars=getScore(rate,40,v[j][1])
        rating_divs+=`
                <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                <div style="display: inline-block; margin: 0;">
                    <div class="box" style="height: 80px; width: 80px;">
                        <img class="profile" src="${v[j][4]}" alt="..."/>
                    </div>
                </div>
                <div style="width:300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content">
                <div class="d-flex justify-content-start fs-3" style="">
                    <span class="col-10">${v[j][3]}</span>
                </div>
                <div id='rating-set-${v[j][1]}'>${rating_stars}</div>

                </div>
                </div>`
    }
    document.getElementById('scroll-layout-rating').innerHTML=rating_divs


    const fileSelect = document.getElementById("fileSelect"),
        fileElem = document.getElementById("fileElem");

    fileSelect.addEventListener("click", function (e) {
        if (fileElem) {
            fileElem.click();
        }
    }, false);
}
async function handleFiles(files) {
    let postJson={}
    const preview=document.getElementById("preview")
    let formData = new FormData();

    for (let i = 0; i < files.length; i++) {

        const file = files[i];
        const idx=(file.name).indexOf('.')
        const format=((file.name).substring(idx+1)).toLowerCase()
        const fileName=`${userId}.${format}`
        const filePath=`/var/www/html/config/userImages/${fileName}`
        postJson[0]=3
        postJson[1]='user'
        postJson[2]=`image=http://ssossotable.com/config/userImages/${fileName}`
        postJson[3]=`id=${userId}`
        await $.post( "script/php/DAOHandler.php",postJson)

        formData.append("filePath", filePath);
        formData.append("image", file);

        await $.ajax({
            type:"POST",
            url: "/script/php/FileHandler.php",
            processData: false,
            contentType: false,
            data: formData
        })

        if (!file.type.startsWith('image/')){ continue }

        const img = document.createElement("img");
        img.classList.add("obj");
        img.file = file;
        img.width=150
        img.height=150

        preview.innerHTML=``
        preview.appendChild(img); // "preview"가 결과를 보여줄 div 출력이라 가정.

        const reader = new FileReader();
        reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
        reader.readAsDataURL(file);
    }
}