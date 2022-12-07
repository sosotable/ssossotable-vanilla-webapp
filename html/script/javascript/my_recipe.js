async function init() {
    recipeInfos=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data: {
            0:'select',
            1:'*',
            2:'recipe',
            3:`userid=${userId}`
        }}))
    let format=``
    for(let i=0;i<recipeInfos.length;i++) {
        format+=`<li class="list-group-item" onclick="show_recipe(${i})">${recipeInfos[i][1]}</li>`
    }
    if(mql.matches) {
        // 모바일
        document.getElementById('my-recipe-info').style.cssText='display:none!important'
        document.getElementById('recipe-list-layout').style.cssText='display:none!important'
        document.getElementById('mobile-recipe').style.cssText='width: 100%!important;'
        document.getElementById('recipe-list-mobile').innerHTML=format
        flag=true;
    } else {
        // 데스크탑
        document.getElementById('recipe-list').innerHTML=format
        flag=false
    }


}
async function show_recipe() {
    let recipeInfo=recipeInfos[arguments[0]]
    let traits=recipeInfo[3].split('\|')
    let traitList=``
    for(let i=0;i<traits.length;i++) {
        traitList+=`
                <li>
                    <span class="recipe-content">${traits[i]}</span>
                </li>
                `
    }
    let recipeForm=`
            <div class="d-flex justify-content-center">
                <div id="preview"><img src="${recipeInfo[4]}" style="width: 240px!important; height: 240px!important;" class="card-img-top" alt="..."></div>
                <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
            </div>
            <div class="mb-3">
                <h5 class="card-title"><label for="exampleFormControlInput1" class="form-label" id="food-name">${recipeInfo[1]}</label></h5>
            </div>
            <div class="mb-3">
                <p id="recipe-memo" class="card-text">${recipeInfo[2]}</p>
            </div>
            <ul id="recipe-list" class="list-group list-group-flush" style="height: 100px; max-height: 100px; overflow-y:auto;">
                ${traitList}
            </ul>
            <br>
            `
    document.getElementById('navbarToggleExternalContent').classList.remove('show')
    if(mql.matches) {
        document.getElementById('food-rating-database').innerHTML=recipeForm
    }
    else {
        document.getElementById('my-recipe-info').innerHTML=recipeForm
    }
}