function scrolltoview() {
  const cto_buttons = [
    { triggerID: "pakket", scrollID: "watleverik" },
    { triggerID: "offerte", scrollID: "contact" },
  ];

  cto_buttons.forEach(({ triggerID, scrollID }) => {
    const button = document.getElementById(triggerID);
    const section = document.getElementById(scrollID);

    button.addEventListener("click", (event) => {
      event.preventDefault();
      section.scrollIntoView({ behavior: "smooth" });
    });
  });
}

function countchar() {
  const question_box = document.getElementById("question-box");
  const character_count_text = document.getElementById("character_count");
  const max_len = 500;
  question_box.addEventListener("input", () => {
    const character_count = max_len - question_box.value.length;
    character_count_text.textContent = `karakters over: ${character_count}`;
  });

  question_box.addEventListener("keydown", (e) => {
    if (
      question_box.value.length >= max_len &&
      e.key !== "Backspace" &&
      e.key !== "Delete" &&
      !e.ctrlKey &&
      !e.metaKey
    ) {
      e.preventDefault();
    }
  });
}

scrolltoview();
countchar();
