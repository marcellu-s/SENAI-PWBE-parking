const placa = document.getElementById("placa");

const regex_placa1 = /[a-zA-Z]{3}[0-9]{4}/;
const regex_placa2 = /[a-zA-Z]{3}[0-9]{1}[a-zA-Z]{1}[0-9]{2}/;

placa.onkeyup = () => {
    if (placa.value.length == 7) {
        let value = placa.value;

        let match = value.match(regex_placa1);
        result_match = match ? 1 : 0;
        
        match = value.match(regex_placa2);
        result_match += match ? 1 : 0;

        console.log(result_match)

        if (result_match != 1) {
            alert('placa inválida')
        }
        
    }
}
