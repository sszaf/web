export function setStyles() {
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