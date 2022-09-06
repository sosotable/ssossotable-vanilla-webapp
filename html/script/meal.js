let selectedObj={
    what:"",
    when:{},
    where:{},
    who:{},
    why:{}
}
//0
const what=`
<div class="card" style="width: 18rem;" id="what">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">오늘 뭘 먹었나요?</p>
    </div>
    <input type="text" placeholder="음식 입력" id="foodName" onchange="setWhat();">
    <div class="card-body" id="hrefId">
        <div class="href">
            <div></div>
            <img src="/src/arrow_forward.png" alt="." style="width:42px;height:42px;" onclick="setOption(1)">
        </div>
    </div>
</div>
`

const beforeSelected="list-group-item"
const selected="list-group-item bg-info text-white"

//1
const when=`
<div class="card" style="width: 18rem;" id="when">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">언제 먹었나요?</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item" onclick="setWhen(0)">아침</li>
        <li class="list-group-item" onclick="setWhen(1)">점심</li>
        <li class="list-group-item" onclick="setWhen(2)">저녁</li>
    </ul>
    <div class="card-body" id="hrefId">
        <div class="href">
            <img src="/src/arrow_back.png" alt="." style="width:42px;height:42px;" onclick="setOption(0)">
            <img src="/src/arrow_forward.png" alt="." style="width:42px;height:42px;" onclick="setOption(2)">
        </div>
    </div>
</div>
`
//2
const where=`
<div class="card" style="width: 18rem;" id="where">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">어디서 먹었나요?</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item" onclick="setWhere(0)">집</li>
        <li class="list-group-item" onclick="setWhere(1)">외식</li>
        <li class="list-group-item" onclick="setWhere(2)">여행</li>
    </ul>
    <div class="card-body" id="hrefId">
        <div class="href">
            <img src="/src/arrow_back.png" alt="." style="width:42px;height:42px;" onclick="setOption(1)">
            <img src="/src/arrow_forward.png" alt="." style="width:42px;height:42px;" onclick="setOption(3)">
        </div>
    </div>
</div>    
`
//3
const who=`
<div class="card" style="width: 18rem;" id="who">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">누구와 먹었나요?</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item" onclick="setWho(0)">혼자</li>
        <li class="list-group-item" onclick="setWho(1)">친구</li>
        <li class="list-group-item" onclick="setWho(2)">가족</li>
        <li class="list-group-item" onclick="setWho(3)">연인</li>
    </ul>
    <div class="card-body" id="hrefId">
        <div class="href">
            <img src="/src/arrow_back.png" alt="." style="width:42px;height:42px;" onclick="setOption(2)">
            <img src="/src/arrow_forward.png" alt="." style="width:42px;height:42px;" onclick="setOption(4)">
        </div>
    </div>
</div>
`
const why=`
<div class="card" style="width: 18rem;" id="why">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">왜 먹었나요?</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item" onclick="setWhy(0)">일반식사</li>
        <li class="list-group-item" onclick="setWhy(1)">친목도모</li>
        <li class="list-group-item" onclick="setWhy(2)">데이트</li>
    </ul>
    <div class="card-body" id="hrefId">
        <div class="href">
            <img src="/src/arrow_back.png" alt="." style="width:42px;height:42px;" onclick="setOption(3);">
            <img src="/src/arrow_forward.png" alt="." style="width:42px;height:42px;" onclick="commit();">
        </div>
    </div>
</div>
`

function setWhat() {
    let value=document.getElementById("foodName").value
    selectedObj.what=value
}
function setWhen() {
    const idx=arguments[0]
    if(selectedObj.when.idx !== undefined) {
        let li_bf=document.getElementsByTagName("li")[parseInt(selectedObj.when.idx)].classList
        let li_af=document.getElementsByTagName("li")[arguments[0]].classList
        selectedObj.when.idx=arguments[0]
        li_bf.remove('bg-info')
        li_bf.remove('text-white')
        li_af.add('bg-info')
        li_af.add('text-white')
    }
    else {
        selectedObj.when.idx=arguments[0]
        let li=document.getElementsByTagName("li")[arguments[0]].classList
        li.add('bg-info')
        li.add('text-white')
    }
    switch (idx) {
        case 0:
            selectedObj.when.name='아침'
            break
        case 1:
            selectedObj.when.name='점심'
            break
        case 2:
            selectedObj.when.name='저녁'
            break
        default:
    }

}
function setWhere() {
    const idx=arguments[0]
    if(selectedObj.where.idx !== undefined) {
        let li_bf=document.getElementsByTagName("li")[parseInt(selectedObj.where.idx)].classList
        let li_af=document.getElementsByTagName("li")[arguments[0]].classList
        selectedObj.where.idx=arguments[0]
        li_bf.remove('bg-info')
        li_bf.remove('text-white')
        li_af.add('bg-info')
        li_af.add('text-white')
    }
    else {
        selectedObj.where.idx=arguments[0]
        let li=document.getElementsByTagName("li")[arguments[0]].classList
        li.add('bg-info')
        li.add('text-white')
    }
    switch (arguments[0]) {
        case 0:
            selectedObj.where.name='집'
            break
        case 1:
            selectedObj.where.name='외식'
            break
        case 2:
            selectedObj.where.name='여행'
            break
        default:
    }
}
function setWho() {
    const idx=arguments[0]
    if(selectedObj.who.idx !== undefined) {
        let li_bf=document.getElementsByTagName("li")[parseInt(selectedObj.who.idx)].classList
        let li_af=document.getElementsByTagName("li")[arguments[0]].classList
        selectedObj.who.idx=arguments[0]
        li_bf.remove('bg-info')
        li_bf.remove('text-white')
        li_af.add('bg-info')
        li_af.add('text-white')
    }
    else {
        selectedObj.who.idx=arguments[0]
        let li=document.getElementsByTagName("li")[arguments[0]].classList
        li.add('bg-info')
        li.add('text-white')
    }
    switch (arguments[0]) {
        case 0:
            selectedObj.who.name='혼자'
            break
        case 1:
            selectedObj.who.name='친구'
            break
        case 2:
            selectedObj.who.name='가족'
            break
        case 3:
            selectedObj.who.name='연인'
            break
        default:
    }
}
function setWhy() {
    const idx=arguments[0]
    if(selectedObj.why.idx !== undefined) {
        let li_bf=document.getElementsByTagName("li")[parseInt(selectedObj.why.idx)].classList
        let li_af=document.getElementsByTagName("li")[arguments[0]].classList
        selectedObj.why.idx=arguments[0]
        li_bf.remove('bg-info')
        li_bf.remove('text-white')
        li_af.add('bg-info')
        li_af.add('text-white')
    }
    else {
        selectedObj.why.idx=arguments[0]
        let li=document.getElementsByTagName("li")[arguments[0]].classList
        li.add('bg-info')
        li.add('text-white')
    }
    switch (arguments[0]) {
        case 0:
            selectedObj.why.name='일반식사'
            break
        case 1:
            selectedObj.why.name='친목도모'
            break
        case 2:
            selectedObj.why.name='데이트'
            break
        default:
    }
}
function setOption() {
    let cardView=document.getElementById("card-view")
    switch (arguments[0]) {
        case 0:
            cardView.innerHTML=what
            break;
        case 1:
            cardView.innerHTML=when
            break;
        case 2:
            cardView.innerHTML=where
            break;
        case 3:
            cardView.innerHTML=who
            break;
        case 4:
            cardView.innerHTML=why
            break;
        default:
            break
    }
}

function commit() {
    console.log(selectedObj)
}