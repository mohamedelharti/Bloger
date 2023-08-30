
import { Dropdown } from 'bootstrap';
import '../css/app.scss';

document.addEventListener('DOMContentLoaded', ()=>{
    enableDropdowns();
});


const enableDropdowns = () =>{
    const dropdownElementList = document.querySelectorAll('.dropdown-toggle')
          dropdownElementList.map(function (dropdownToggleEl){
            return new Dropdown(dropdownToggleEl)
          });
}
