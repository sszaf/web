document.addEventListener('DOMContentLoaded', function() {
    const text_color_input = document.getElementById('text_color_input');
    const bg_color_input = document.getElementById('bg_color_input');
    const font_family_input = document.getElementById('font_family_input');
    
    setStyles();
    
    
    bg_color_input.addEventListener("input",function() {
        document.body.style.backgroundColor = this.value;
        localStorage.setItem('backgroundColor', this.value);
    })
    
    
    text_color_input.addEventListener("input",function() {
        document.body.style.color = this.value;
        localStorage.setItem('textColor', this.value);
    })
    
    font_family_input.addEventListener("change",function() {
        document.body.style.fontFamily = this.value;
        localStorage.setItem('fontFamily', this.value);
    })
});


function setStyles() {
    const savedBackgroundColor = localStorage.getItem('backgroundColor');
    const savedTextColor = localStorage.getItem('textColor');
    const savedFontFamily = localStorage.getItem('fontFamily');
    if (savedBackgroundColor) {
        document.body.style.backgroundColor = savedBackgroundColor;
      }

      if (savedTextColor) {
        document.body.style.color = savedTextColor;
      }

      if (savedFontFamily) {
        document.body.style.fontFamily = savedFontFamily;
      }
}
