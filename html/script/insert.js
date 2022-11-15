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
    spice:0,
    soda:0,
    slimy:0,
    fruit:0
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
    spice:'향신료',
    soda:'탄산',
    slimy:'물컹거림',
    fruit:'과일'
}

const delete_trait=(idx)=>{

    document.getElementById(list_content[idx]).style.visibility='visible'
    let trait_list=document.getElementById('traits_list')
    if(default_traits[list_content[idx]]!==undefined) {
        trait_count-=1
        trait_predict-=parseFloat(userProfile[list_content[idx]])
        if(trait_count>0) {
            document.getElementById('rating-predict').innerHTML=`
            예상 점수: <span id="rating-predict-content">${((trait_predict/trait_count)/2).toFixed(2)}</span>
            `
        } else {
            document.getElementById('rating-predict').innerHTML=``
        }
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
    console.log(arguments)
    if(arguments[0]==0) {
        let trait=document.getElementById('trait_name').value
        if(trait!=='') {
            document.getElementById('trait_name').value=''
            const format=
                `
                <div class="trait_item" id="${trait}">
                    <li>${trait}</li> <span onclick="delete_trait(${list_idx})"><img src="src/close.png" width="20px" height="20px"></span> <br>
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
        trait_count+=1
        trait_predict+=parseFloat(userProfile[arguments[0]])
        document.getElementById('rating-predict').innerHTML=`
            예상 점수: <span id="rating-predict-content">${((trait_predict/trait_count)/2).toFixed(2)}</span>
            `
        if(default_traits[arguments[0]]!=1) {
            let trait=arguments[0]
            default_traits[arguments[0]]=1
            let id=arguments[0]+"_li"
            if(trait!=='') {
                const format=
                    `
                <div class="trait_item" id="${id}">
                    <li>${traits_en_kr[arguments[0]]}</li> <span onclick="delete_trait(${list_idx})"><img src="src/close.png" width="20px" height="20px"></span> <br>
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
        spice:0,
        soda:0,
        slimy:0,
        fruit:0
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
}

function clear_page() {
    clear_trait()
    document.getElementById('food_name').innerText='foodname'
}

async function commit() {

    let traits=``
    for(let i=0;i<Object.keys(list_content).length;i++) {
        if(i===Object.keys(list_content).length-1)
            traits+=list_content[i]
        else
            traits+=list_content[i]+'|'
    }

    let find_food=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data: {
            0:'select',
            1:'*',
            2:'food',
            3:`name='${foodName}'`
        }}))

    if(find_food.length>0) {
        alert('이미 존재하는 음식')
    }
    else {
        await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0:'insert',
                1:`food(name,trait)`,
                2:`'${foodName}','${traits}'`
            }})
        const v=JSON.parse(await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0:'select',
                1:'id',
                2:'food',
                3:`name='${foodName}'`
            }}))
        const id=parseInt(v[0][0])
        await $.ajax({
            type: "POST",
            url: '/script/php/DAOHandler.php',
            data: {
                0:'insert',
                1:
                    `trait(`+
                    `id,korean,japanese,chinese,asian,`+
                    `western,fried,raw,grilled,soup,stir_fried,`+
                    `steamed,wheat,dessert,beverage,sweetness,`+
                    `sour_taste,spicy,noodle,seafood,`+
                    `meat,vegetable,rice,spice,`+
                    `soda,slimy,fruit)`,
                2:`${id},`+
                    `${default_traits['korean']},${default_traits['japanese']},${default_traits['chinese']},`+
                    `${default_traits['asian']},${default_traits['western']},${default_traits['fried']},`+
                    `${default_traits['raw']},${default_traits['grilled']},${default_traits['soup']},`+
                    `${default_traits['stir_fried']},${default_traits['steamed']},${default_traits['wheat']},`+
                    `${default_traits['dessert']},${default_traits['beverage']},${default_traits['sweetness']},`+
                    `${default_traits['sour_taste']},${default_traits['spicy']},${default_traits['noodle']},`+
                    `${default_traits['seafood']},${default_traits['meat']},${default_traits['vegetable']},`+
                    `${default_traits['rice']},${default_traits['spice']},`+
                    `${default_traits['soda']},${default_traits['slimy']},${default_traits['fruit']}`
            }})
    }
    clear_page()
}