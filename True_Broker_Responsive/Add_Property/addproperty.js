function autoExpand(field) {
    field.style.height = 'auto'; // Reset height
    field.style.height = field.scrollHeight + 'px'; // Set to scrollHeight
  }
  // Auto-expand function
  function autoExpand(field) {
    field.style.height = 'auto';
    field.style.height = field.scrollHeight + 'px';
  }

  // // Add bullet point on Enter key
  // document.getElementById("description").addEventListener("keydown", function (e) {
  //   if (e.key === "Enter") {
  //     e.preventDefault(); // Prevent default new line behavior

  //     const bullet = "• ";
  //     const cursorPos = this.selectionStart;
  //     const textBefore = this.value.substring(0, cursorPos);
  //     const textAfter = this.value.substring(cursorPos);

  //     // Insert bullet at new line
  //     this.value = textBefore + "\n" + bullet + textAfter;

  //     // Move cursor to the right place
  //     this.selectionStart = this.selectionEnd = cursorPos + bullet.length + 1;

  //     // Trigger height adjustment
  //     autoExpand(this);
  //   }
  // });

  // // Optional: Insert first bullet automatically when user starts typing
  // document.getElementById("description").addEventListener("focus", function () {
  //   if (this.value.trim() === "") {
  //     this.value = "• ";
  //   }
  // });