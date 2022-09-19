let default_traits={
    korean:0,
    japanese:0,
    chinese:0,
    asian:0,
    western:0,
    fried:0,
    grilled:0,
    soup:0,
    stir_fried:0,
    raw:0,
    steamed:0,
    dessert:0,
    wheat:0,
    beverage:0,
    sweetness:0,
    sour_taste:0,
    spicy:0,
    noodle:0,
    seafood:0,
    meat:0,
    vegetable:0,
    rice:0,
    spice:0
}
let traits_en_kr={
    korean:'한국',
    japanese:'일본',
    chinese:'중국',
    asian:'아시아',
    western: '양식',
    fried:'튀김',
    grilled:'구이',
    soup:'국물',
    stir_fried:'볶음/비빔',
    raw:'생식/회',
    steamed:'찜/조림',
    wheat:'밀/빵',
    dessert:'디저트',
    beverage:'음료수',
    sweetness:'단맛',
    sour_taste:'신맛',
    spicy:'매운맛',
    noodle:'면',
    seafood:'해물',
    meat:'육고기',
    vegetable:'채소',
    rice:'쌀',
    spice:'향신료'
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
    let target = document.getElementById("rating").getElementsByClassName("material-symbols-outlined")-
    clear()
    set_rate(idx)
    score=idx
}

const delete_trait=(idx)=>{
    document.getElementById(list_content[idx]).style.visibility='visible'
    let trait_list=document.getElementById('traits_list')
    if(default_traits[list_content[idx]]!==undefined) {
        default_traits[list_content[idx]]=0
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
        if(default_traits[arguments[0]]!=1) {
            let trait=arguments[0]
            default_traits[arguments[0]]=1
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

function clear_trait() {
    default_traits={
        korean:0,
        japanese:0,
        chinese:0,
        asian:0,
        western:0,
        fried:0,
        grilled:0,
        soup:0,
        stir_fried:0,
        raw:0,
        steamed:0,
        dessert:0,
        wheat:0,
        beverage:0,
        sweetness:0,
        sour_taste:0,
        spicy:0,
        noodle:0,
        seafood:0,
        meat:0,
        vegetable:0,
        rice:0,
        spice:0
    }
    for(let idx=0;idx<list_idx;idx++) {
        delete_trait(idx)
    }
    list_idx=0
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

function clear_page() {
    clear()
    clear_trait()
    document.getElementById('food_name').innerText='foodname'
}

const commit=()=>{
    $.ajax({
        url: "/script/main_insert.php",
        method: "POST",
        data: {
            username:userName,
            userid:userId,

            foodname:foodName,

            contents: list_content,
            default_traits: default_traits,

            scoreResult:score,
        }
    })
        .done((data)=>{
            if(JSON.parse(data)===false)
                alert('이미 평가한 음식')
            else
                clear_page()
        })
        .fail( (err) => {
            console.log('err',JSON.stringify(err))
        });
}