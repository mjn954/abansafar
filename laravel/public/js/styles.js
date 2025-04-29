
    function searchTour() {
      const searchInput = document.getElementById("searchInput").value.trim().toLowerCase();
      const resultBox = document.getElementById("searchResult");
      const cards = document.querySelectorAll("#tourCards .col-md-6, #tourCards .col-lg-3, #tourCards .col-md-4");
      let found = false;

      if (searchInput === '') {
        resultBox.innerHTML = 'لطفاً یک مقصد وارد کنید.';
        cards.forEach(card => card.style.display = 'none');
        return;
      }

      cards.forEach(card => {
        const destination = card.getAttribute('data-destination')?.toLowerCase() || '';
        const title = card.querySelector('.card-title')?.innerText.toLowerCase() || '';
        const text = card.querySelector('.card-text')?.innerText.toLowerCase() || '';

        if (
          destination.includes(searchInput) ||
          title.includes(searchInput) ||
          text.includes(searchInput)
        ) {
          card.style.display = 'block';
          found = true;
        } else {
          card.style.display = 'none';
        }
      });

      if (!found) {
        resultBox.innerHTML = `موردی برای "<span class="text-danger">${searchInput}</span>" یافت نشد.`;
      } else {
        resultBox.innerHTML = `نتایج برای: <span class="text-primary">${searchInput}</span>`;
      }
    }
