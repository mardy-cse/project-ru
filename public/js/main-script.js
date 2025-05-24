/**
 * Toggle Sidebar Menu
 */
(function () {
  const menuBodyWrap = document.querySelector(".menuBodyWrap");
  const skdNavResBtn = document.querySelector(".skdSidebarResNavBtn");
  const skdNavBtn = document.querySelector(".skdSidebarNavBtn");
  const skdMainContainer = document.querySelector("#skdDashMainContainer");

  if (skdNavBtn && skdMainContainer) {
    skdNavBtn.addEventListener("click", () => {
      skdMainContainer.classList.toggle("sidebarOpen");
    });
  }

  if (skdNavResBtn && skdMainContainer) {
    skdNavResBtn.addEventListener("click", () => {
      skdMainContainer.classList.toggle("sidebarOpen");
    });
  }

  if (menuBodyWrap && skdMainContainer) {
    menuBodyWrap.addEventListener("click", () => {
      skdMainContainer.classList.toggle("sidebarOpen");
    });
  }
      
})();





