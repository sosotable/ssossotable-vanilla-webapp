let default_traits={
    korean:false,
    japanese:false,
    chinese:false,
    southeast_asian:false,
    south_asian:false,
    middle_eastern:false,
    western:false,
    african:false,
    latin_american:false,
    north_american:false,
    oceania:false,
    mediterranean:false,
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
    beverage:false
}
let traits_en_kr={
    korean:'한국',
    japanese:'일본',
    chinese:'중국',
    southeast_asian:'동남아시아',
    south_asian:'남아시아',
    middle_eastern:'중동',
    western:'서양',
    african:'아프리카',
    latin_american:'라틴아메리카',
    north_american:'북아메리카',
    oceania:'오세아니아',
    mediterranean:'지중해',
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
    beverage:'음료수'
}

const clear=()=>{
    let target = document.getElementById("rating").getElementsByClassName("material-symbols-outlined")
    for(let i=0;i<5;i++)
        target[i].style=before_rate
}
const set_rate=(idx)=>{
    let target = document.getElementById("rating").getElementsByClassName("material-symbols-outlined")
    for(let i=0;i<idx;i++)
        target[i].style=after_rate
}
const set=(idx)=>{
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
const recycle=()=>{
    location.reload()
}
const commit=()=>{
    $.ajax({
        url: "/script/insert.php",
        method: "POST",
        data: {
            username:userName,
            userid:userId,

            foodname:foodName,
            foodid:foodId,

            contents: list_content,
            default_traits: default_traits,

            scoreResult:score,

            currTime:Date.now(),
            maxLen:len
        }
    })
        .done((data)=>{
            location.reload()
        })
        .fail( (err) => {
            console.log('err',JSON.stringify(err))
        });
}