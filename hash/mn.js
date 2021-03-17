const labels = document.querySelectorAll("label");
labels.forEach((label) => {
    label.innerHTML = label.innerText
        .split("")
        .map((letter, index) => {
            return `<span style="transition-delay:${index * 100}ms">${letter}</span>`;
        })
        .join("");
})