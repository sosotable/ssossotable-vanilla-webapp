async function search() {
    const name=document.getElementById('search').innerText
    const info=JSON.parse(await $.ajax({
        type: "POST",
        url: '/script/php/DAOHandler.php',
        data:{
            0:'select',
            1:"*",
            2:"food",
            3:`name='${name}'`
        }}))
    if(Object.keys(info).length===0) {
        alert('찾는 음식이 존재하지 않아요')
        location.reload()
        return
    }
    if(flag===false) {
    }
    else {
        const form = document.createElement("form");

        form.setAttribute("type", "hidden");
        form.setAttribute("id","food-info")
        form.setAttribute("action","http://ssossotable.com/food_info")
        form.setAttribute("method","post")

        const input = document.createElement("input")

        input.setAttribute("type", "hidden");
        input.setAttribute("name", "food_name");
        input.setAttribute("value", `'${name}'`);

        form.appendChild(input)
        document.getElementById(`search`).appendChild(form)

        document.getElementById("food-info").submit()
    }
}