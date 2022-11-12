let round = document.querySelector(".round");

let side_bar_Container = document.querySelector(".side_bar_Container");
let accordial_all_list = document.querySelectorAll(
  ".accordian_single_list, .NPIS_logo_right_content"
);
// --------------------------------------------------------------------------------------------
let Mainbody_conatiner = document.querySelector(".Mainbody_conatiner");
round.addEventListener("click", () => {
  side_bar_Container.classList.remove("show");
  Mainbody_conatiner.classList.add("active");
  accordial_all_list.forEach((asl) => {
    asl.classList.add("active");
  });
});
// --------------------------------------------------------------------------------------------
document.querySelector(".NPIS_logo").addEventListener("click", () => {
  side_bar_Container.classList.add("show");
  Mainbody_conatiner.classList.remove("active");
  accordial_all_list.forEach((asl) => {
    asl.classList.remove("active");
  });
});
// --------------------------------------------------------------------------------------------

let accordian_single_list = document.querySelectorAll(".accordian_single_list");
let d_arrow = document.querySelectorAll(".d_arrow");

accordian_single_list.forEach((asl) => {
  asl.addEventListener("click", () => {
    d_arrow.forEach((darr) => {
      darr.classList.remove("active");
    });
    let arrow = asl.querySelector(".d_arrow");
    arrow.classList.add("active");
    // if (arrow.classList.contains("active")) {
    //   arrow.classList.remove("active");
    // }else{
    //     arrow.classList.a("active");

    // }
    // arrow.classList.contains("active")
    //   ? arrow.classList.remove("active")
    //   : arrow.classList.add("active");
  });
});
