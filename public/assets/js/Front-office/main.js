const Parent = document.getElementById("Parent");
const Parent2 = document.getElementById("Parent2");
let InputDepart = "";
let InputDistination = "";

// the search use ajax

function Search(e) {
    const getInputs = e.currentTarget.querySelectorAll("input");
    const _token = getInputs[0].value;
    const gare_depart = getInputs[1].value;
    const gare_distination = getInputs[2].value;
    InputDepart = getInputs[1];
    InputDistination = getInputs[2];
    console.log(InputDistination);
    const data = {
        gare_depart: gare_depart,
        gare_distination: gare_distination,
        _token: _token,
    };
    const xml = new XMLHttpRequest();
    xml.open("POST", "/Search");
    xml.setRequestHeader("Content-type", "application/json");
    xml.send(JSON.stringify(data));
    xml.onreadystatechange = () => {
        if (xml.readyState === 4 && xml.status === 200) {
            const res = JSON.parse(xml.responseText);
            if (!res) return;

            if (InputDepart === document.activeElement) {
                Parent.style.display = "block";
                Parent.innerHTML = "";
                for (let i = 0; i < res[0].length; i++) {
                    Parent.insertAdjacentHTML(
                        "beforeend",
                        `
                        <p class="regions">${res[0][i]["names"].en}</p>
                    `
                    );
                }
            }
            if (InputDistination === document.activeElement) {
                Parent2.style.display = "block";
                Parent2.innerHTML = "";
                console.log(res);
                for (let i = 0; i < res[1].length; i++) {
                    Parent2.insertAdjacentHTML(
                        "beforeend",
                        `
                        <p class="regions">${res[1][i]["names"].en}</p>
                    `
                    );
                }
            }
        }
    };
}

// set the name in the input

function TackeValue(e) {
    const ValueElement = e.target.innerHTML;
    InputDepart.value = ValueElement;
}
function TackeValueDest(e) {
    const ValueElement = e.target.innerHTML;
    InputDistination.value = ValueElement;
}

// hidden the result for search into click in the document

document.addEventListener("click", () => {
    Parent.style.display = "none";
    Parent.innerHTML = "";
    Parent2.style.display = "none";
    Parent2.innerHTML = "";
});
