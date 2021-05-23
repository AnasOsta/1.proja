function openNav() {
    document.getElementById('mysidenav').style.width = "250px";
    document.getElementById('main').style.width = "250px";

}

function closeNav() {
    document.getElementById('mysidenav').style.width = "0px";
    document.getElementById('main').style.width = "0px";

}
// API javaScript
const api = "https://www.breakingbadapi.com/api/characters";

async function getData() {
    try {
        const response = await fetch(api)
        const data = await response.json();
        printData(data)
    } catch (e) {
        console.log("Error", e.message)
    }
}

function printData(data) {
    const header = document.querySelector("#header")

    header.innerHTML += `
    <select class="form-control" onchange="getCh(this.value)">
        <option> Please Select </option>
        ${data.map( charachter => `<option> ${charachter.name} </option>`)}
    </select>`
}

async function getCh(name){
    if(name !== 'Please Select'){
        const response = await fetch(`${api}?name=${name}`)
    const data = await response.json()

                     
    document.querySelector("#image").src = data[0].img
    document.querySelector("#img").src = data[0].img
    document.querySelector("#content h5").innerHTML =  data[0].name
    document.querySelector("#content p").innerHTML =  `nickname: ${data[0].nickname} <br>
                                                         occupation: ${data[0].occupation} <br>
                                                         status: ${data[0].status} <br>
                                                         Breaking Bad Seasons: ${data[0].appearance}`
    }
}

getData()