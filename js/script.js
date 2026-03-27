// CeylonBites - Global Scripts

// Enforce maxLength on number inputs
document.querySelectorAll('input[type="number"]').forEach(numberInput => {
    numberInput.addEventListener('input', () => {
        if (numberInput.value.length > numberInput.maxLength) {
            numberInput.value = numberInput.value.slice(0, numberInput.maxLength);
        }
    });
});
