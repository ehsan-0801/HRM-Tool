const getId = (id) => {
    const idInput = document.getElementById(id);
    return idInput;
}
const gross_salary_id = getId("gross_salary")
gross_salary_id.addEventListener("keyup", myFunction);

function myFunction() {
    const gross_salary_id = getId("gross_salary")
    const gross_salary_value = gross_salary_id.value;
    const basic_salaray_id = getId("basic_salary").value = Math.floor(gross_salary_value * .6);
    const house_rent_id = getId("house_rent").value = Math.floor(gross_salary_value * .2);
    const medical_allowence_id = getId("medical_allowence").value = Math.floor(gross_salary_value * .12)
    const conveyance_id = getId("conveyance").value = Math.floor(gross_salary_value * .08)
}