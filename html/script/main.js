let default_traits={
    korean:false,
    japanese:false,
    chinese:false,
    asian:false,
    western: false,
    fried:false,
    sushi:false,
    grilled:false,
    soup:false,
    stir_fried:false,
    raw_food:false,
    stewed:false,
    stew:false,
    steamed:false,
    snack:false,
    bread:false,
    jelly:false,
    beverage:false,
    sweetness:false,
    sour_taste:false,
    spicy:false,
    noodle:false,
    seafood:false,
    meat:false,
    vegetable:false
}
let traits_en_kr={
    korean:'한국',
    japanese:'일본',
    chinese:'중국',
    asian:'아시아',
    western: '양식',
    fried:'튀김',
    sushi:'회',
    grilled:'구이',
    soup:'국',
    stir_fried:'볶음',
    raw_food:'생식',
    stewed:'조림',
    stew:'찌개',
    steamed:'찜',
    snack:'과자',
    bread:'빵',
    jelly:'젤리',
    beverage:'음료수',
    sweetness:'단맛',
    sour_taste:'신맛',
    spicy:'매운맛',
    noodle:'면',
    seafood:'해물',
    meat:'육고기',
    vegetable:'채소'
}

const clear=()=>{
    let target = document.getElementById("rating").getElementsByClassName("material-symbols-outlined")
    for(let i=0;i<5;i++) {
        target[i].innerHTML =
        `<span className="material-symbols-outlined" onClick="set(${i + 1})">
            <img src="/src/rate_star_before.png" height="80" width="80">
        </span>`
    }
}
const set_rate=(idx)=>{
    let target = document.getElementById("rating").getElementsByClassName("material-symbols-outlined")
    for(let i=0;i<idx;i++) {
        target[i].innerHTML =
        `<span className="material-symbols-outlined" onClick="set(${i + 1})">
            <img src="/src/rate_star_after.png" height="80" width="80">
        </span>`
    }
}
const set=(idx)=>{
    let target = document.getElementById("rating").getElementsByClassName("material-symbols-outlined")
    console.log(target[idx])
    console.log(idx)
    clear()
    set_rate(idx)
    score=idx
}

const delete_trait=(idx)=>{
    document.getElementById(list_content[idx]).style.visibility='visible'
    let trait_list=document.getElementById('traits_list')
    if(default_traits[list_content[idx]]!==undefined) {
        default_traits[list_content[idx]]=false
    }
    delete list[idx]
    delete list_content[idx]
    let list_items=''
    for(let key in list) {
        list_items+=list[key]
    }
    trait_list.innerHTML=list_items

}
function add_trait() {
    if(arguments[0]==0) {
        let trait=document.getElementById('trait_name').value
        if(trait!=='') {
            document.getElementById('trait_name').value=''
            const format=
                `
                <div class="trait_item" id="${trait}">
                    <li>${trait}</li> <span class="material-symbols-outlined" onclick="delete_trait(${list_idx})">close</span> <br>
                </div>
                `
            list[list_idx]=format
            list_content[list_idx]=trait
            list_idx++
            let trait_list=document.getElementById('traits_list')
            let list_items=''
            for(let key in list) {
                list_items+=list[key]
            }
            trait_list.innerHTML=list_items
        }
    }
    else {
        if(default_traits[arguments[0]]!=true) {
            let trait=arguments[0]
            default_traits[arguments[0]]=true
            let id=arguments[0]+"_li"
            if(trait!=='') {
                const format=
                    `
                <div class="trait_item" id="${id}">
                    <li>${traits_en_kr[arguments[0]]}</li> <span class="material-symbols-outlined" onclick="delete_trait(${list_idx})">close</span> <br>
                </div>
                `
                list[list_idx]=format
                list_content[list_idx]=trait
                list_idx++
                let trait_list=document.getElementById('traits_list')
                let list_items=''
                for(let key in list) {
                    list_items+=list[key]
                }
                trait_list.innerHTML=list_items
                document.getElementById(trait).style.visibility='hidden'
            }
        }
    }

}

const modify_foodname=()=>{
    foodName=document.getElementById('food_name_modify').value
    document.getElementById('food_name').innerText=foodName
    document.getElementById('food_name_modify').value=''
    $.ajax({
        url: "getId.php",
        method: "POST",
        data: {
            foodname:foodName
        }
    })
        .done((data)=>{
            if(Number.isNaN(parseInt(data))) {
                console.log('NaN')
            }
            else {
                foodId=parseInt(data)
            }
        })
        .fail( (err) => {
            console.log('err',JSON.stringify(err))
        });
}
function modify_location() {
    foodLocation=document.getElementById('food_location_modify').value
    document.getElementById('food_location_modify').value=''
    document.getElementById('food_location').innerText=foodLocation
}
const recycle=()=>{
    location.reload()
}
function delete_food() {
    $.ajax({
        url: "/script/delete_food.php",
        method: "POST",
        data: {
            foodId:foodId
        }
        })
        .done((data)=>{
            // console.log(data)
            location.reload()
        })
        .fail( (err) => {
            console.log('err',JSON.stringify(err))
        });
}
const commit=()=>{
    $.ajax({
        url: "/script/main_insert.php",
        method: "POST",
        data: {
            username:userName,
            userid:userId,

            foodname:foodName,
            foodid:foodId,
            foodLocation:foodLocation,

            contents: list_content,
            default_traits: default_traits,

            scoreResult:score,
        }
    })
        .done((data)=>{
            location.reload()
        })
        .fail( (err) => {
            console.log('err',JSON.stringify(err))
        });
}