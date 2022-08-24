const clear=()=>{
    let target = document.getElementById("rating").getElementsByClassName("material-symbols-outlined")
    for(let i=0;i<5;i++)
        target[i].style=before_rate
}
const set_rate=(idx)=>{
    let target = document.getElementById("rating").getElementsByClassName("material-symbols-outlined")
    console.log(target)
    for(let i=0;i<idx;i++)
        target[i].style=after_rate
}
const set=(idx)=>{
    clear()
    set_rate(idx)
    score=idx
}

const delete_trait=(idx)=>{
    let trait_list=document.getElementById('traits_list')
    delete list[idx]
    delete list_content[idx]
    let list_items=''
    for(let key in list) {
        list_items+=list[key]
    }
    trait_list.innerHTML=list_items
}
const add_trait=()=>{
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
const modify_foodname=()=>{
    foodName=document.getElementById('food_name_modify').value
    document.getElementById('food_name').innerText=foodName

}
const recycle=()=>{
    location.reload()
}
const commit=()=>{
    $.ajax({
        url: "insert.php",
        method: "POST",
        data: {
            username:userName,
            userid:userId,

            foodname:foodName,
            foodid:foodId,

            contents: list_content,
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