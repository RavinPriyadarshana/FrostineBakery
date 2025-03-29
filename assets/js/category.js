// Function to display the modal with product details
function showModal(name, description, price, image) {
    document.getElementById('productModal').style.display = 'block';
    document.getElementById('modalName').innerText = name;
    document.getElementById('modalDescription').innerText = description;
    document.getElementById('modalPrice').innerText = price;
    document.getElementById('modalImage').src = image;
}

// Function to close the modal
function closeModal() {
    document.getElementById('productModal').style.display = 'none';
}

// Close modal when the user clicks outside the modal content
window.onclick = function (event) {
    if (event.target == document.getElementById('productModal')) {
        closeModal();
    }
}
