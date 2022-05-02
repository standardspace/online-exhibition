// Go wild...
// import Macy from "macy";
import Lays from 'lays.js'
import A11yDialog from 'a11y-dialog';
var inViewport = require('in-viewport');

const maGallery = document.querySelector('.ma-gallery');

if (maGallery) {

  // Grid the gallery
  // const maGalleryGrid = Macy({
  //   container: maGallery,
  //   trueOrder: true,
  //   waitForImages: false,
  //   mobileFirst: true,
  //   margin: 8,
  //   columns: 1,
  //   breakAt: {
  //     520: {
  //       margin: 16,
  //       columns: 2
  //     },
  //     1024: {
  //       margin: 32,
  //       columns: 3
  //     },
  //     1440: {
  //       margin: 48,
  //       columns: 4
  //     }
  //   }
  // });

    const lays = Lays({
      parent: maGallery, 
      prependItems: false,
      maxItems: Infinity,
      breakpoints: {
        576: 2,
        768: 2,
        992: 3,
        1200: 4
      },
    });
    lays.render();

  // Gallery modal
  const galleryItems = maGallery.querySelectorAll('.ma-gallery__item');

  let modalArtworks = '';

  const iconChevronLeft = `<svg 
    xmlns="http://www.w3.org/2000/svg"
    focusable="false"
    height="24px" 
    viewBox="0 0 24 24" 
    width="24px" 
    fill="#000000">
      <path d="M0 0h24v24H0z" fill="none"/><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
    </svg>`

  const iconChevronRight = `<svg 
    xmlns="http://www.w3.org/2000/svg"
    focusable = "false"
    height="24px" 
    viewBox="0 0 24 24" 
    width="24px" 
    fill="#000000">
      <path d="M0 0h24v24H0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
    </svg>`;

  // Create Modal Content
  galleryItems.forEach((item, idx) => {
    const itemTitle = item.querySelector('.ma-gallery__item__title').innerText;
    const imageFullPath = item.dataset.imageFull;
    const itemLink = item.querySelector('.ma-gallery__item__link').getAttribute('href');
    const itemArtist = item.dataset.artist;
    const itemArtistUrl = item.dataset.artistUrl;
    const itemPostId = item.dataset.postId

    // Get a link and add
    modalArtworks += `
    <li class="ma-gallery-scroller__item" id="ma-gallery-scroll-item-${idx}" data-post-id="${itemPostId}">
      <figure class="ma-gallery-scroller__item__figure">
        <img class="ma-gallery-scroller__item__image" src="${imageFullPath}" alt="Artwork: ${itemTitle}" loading="lazy" />
        <figcaption class="ma-gallery-scroller__item__title">
          <a href="${itemLink}">${itemTitle}</a> 
          by <a href="${itemArtistUrl}">${itemArtist}</a>
        </figcaption>
      </figure>
    </li>`
  });

  // modal markup
  const modal = document.createElement('div');
  modal.classList.add('dialog');
  modal.id = "my-dialog";
  modal.setAttribute('aria-hidden', true);
  modal.innerHTML = `<div class="dialog-overlay" tabindex="-1" data-a11y-dialog-hide></div>
    <div
      role="dialog"
      class="dialog-content"
      aria-label="Gallery artwork viewer"
    >
      <button
        data-a11y-dialog-hide
        class="dialog-close"
        aria-label="Close this dialog window"
      >
        &times;
      </button>

      <ul class="ma-gallery-scroller">
        ${modalArtworks}
      </ul>
      <div class="ma-gallery-scroller-nav"> 
        <button class="ma-gallery-scroller-nav__prev"><span class="sr-only">Previous</span>${iconChevronLeft}</button>
        <button class="ma-gallery-scroller-nav__next"><span class="sr-only">Next</span>${iconChevronRight}</button>
      </div>

    </div>`;

  document.body.appendChild(modal);

  var dialogEl = document.getElementById('my-dialog')
  var mainEl = document.querySelector('main')
  var dialog = new A11yDialog(dialogEl, mainEl)

  dialog.on('show', function (dialogEl, triggerEl) {
    // console.log(dialogEl)
    // console.log(triggerEl)

    const galleryScroller = dialogEl.querySelector('.ma-gallery-scroller');
    const galleryItems = galleryScroller.querySelectorAll('.ma-gallery-scroller__item');
    // console.log(galleryScroller)

    const buttonPrev = dialogEl.querySelector('.ma-gallery-scroller-nav__prev');
    const buttonNext = dialogEl.querySelector('.ma-gallery-scroller-nav__next');

    const navigateScroller = (evt, type) => {
      galleryItems.forEach((item, idx) => {
        let currentVisible = inViewport(item, {
          container: galleryScroller,
          offset: -100
        });

        if (currentVisible) {
          const targetElIdx = ( type === "next") ? idx + 1 : idx - 1;
          galleryItems[targetElIdx].scrollIntoView({
            behavior: "smooth",
          });
        }
      })
    }

    buttonPrev.addEventListener("click", (evt) => {
      navigateScroller(evt, 'prev')
    })

    buttonNext.addEventListener("click", (evt) => {
      navigateScroller(evt, 'next')
    })

    // Listen for scroll events as we;ll need to 
    // disable buttons when scroll reaches beginning or end
    // Setup isScrolling variable
    let isScrolling;
    galleryScroller.addEventListener('scroll', function (event) {

      // Clear our timeout throughout the scroll
      window.clearTimeout(isScrolling);

      // Set a timeout to run after scrolling ends
      isScrolling = setTimeout(function () {

        // Run the callback
        galleryItems.forEach((item, idx) => {
          let currentVisible = inViewport(item, {
            container: galleryScroller,
            offset: -100
          });

          if (currentVisible) {

            // Disable button if reached beginning or end
            if (galleryItems.length - 1 === idx) {
              console.log('end of the line');
              buttonPrev.disabled = false;
              buttonNext.disabled = true;
            } else if (idx === 0) {
              console.log('start of the line');
              buttonPrev.disabled = true;
              buttonNext.disabled = false;
            }

            // Update url hash
            const itemPostId = item.dataset.postId
            // history.pushState(null, null, '#item-' + itemPostId);
            history.replaceState(null, null, '#item-' + itemPostId)
          }
        })

      }, 66);

    }, false);
  })

  dialog.on('hide', () => {
    console.log('dialog closed');
    location.hash = ""
    history.replaceState("", "", location.pathname)
  })


  galleryItems.forEach( (galleryItem, idx) => {

    const imageFullPath = galleryItem.dataset.imageFull;
    const itemHeading = galleryItem.querySelector('.ma-gallery__item__title')
    const link = itemHeading.querySelector('.ma-gallery__item__link')
    const linkInner = link.innerHTML;

    galleryItem.dataset.itemIndex = idx;

    // Swap link for button
    itemHeading.innerHTML = `<button class="ma-gallery__item__button" data-a11y-dialog-show="my-dialog">${linkInner}</button>`

    const itemButton = itemHeading.querySelector('.ma-gallery__item__button')

    itemButton.onclick = () => {

      const itemIndex = galleryItem.dataset.itemIndex;
      const targetItem = document.getElementById('ma-gallery-scroll-item-' + itemIndex)

      // Open gallery modal
      dialog.show();

      // Re-enable buttons (they may have been disable in previous opening)
      const buttonPrev = dialogEl.querySelector('.ma-gallery-scroller-nav__prev');
      const buttonNext = dialogEl.querySelector('.ma-gallery-scroller-nav__next');
      buttonPrev.disabled = false;
      buttonNext.disabled = false;

      // Scroll to clicked item
      targetItem.scrollIntoView();

      // Disable previous button if first item
      if (itemIndex == 0) {
        buttonPrev.disabled = true
      }
    }

  })

  // Open on hash link
  if (window.location.hash && window.location.hash.startsWith('#item-')) {
    const itemToOpenPostId = window.location.hash.replace('#item-', '');
    const itemToOpen = document.querySelector(`[data-post-id="${itemToOpenPostId}"]`);

    if (itemToOpen) {
      const itemToOpenButton = itemToOpen.querySelector('button');
      // Button focus 
      itemToOpenButton.focus();
      // Button click
      itemToOpenButton.click();
    }
  }
}

// Artwork series dialog

var artworkSeriesDialogEl = document.getElementById('dialog-artwork-series')
// var mainEl = document.querySelector('main')
if (artworkSeriesDialogEl) {

  var artworkSeriesDialog = new A11yDialog(artworkSeriesDialogEl, mainEl)

  const buttonArtworkSeriesDialog = document.getElementById('dialog-artwork-series-open');

  buttonArtworkSeriesDialog.addEventListener('click', () => {
    artworkSeriesDialog.show();

    // Re-enable buttons (they may have been disable in previous opening)
    const buttonPrev = artworkSeriesDialogEl.querySelector('.ma-gallery-scroller-nav__prev');
    const buttonNext = artworkSeriesDialogEl.querySelector('.ma-gallery-scroller-nav__next');
    buttonPrev.disabled = false;
    buttonNext.disabled = false;

  })

  artworkSeriesDialog.on('show', function (artworkSeriesDialogEl, triggerEl) {
    // console.log(dialogEl)
    // console.log(triggerEl)

    const galleryScroller = artworkSeriesDialogEl.querySelector('.ma-gallery-scroller');
    const galleryItems = galleryScroller.querySelectorAll('.ma-gallery-scroller__item');
    // console.log(galleryScroller)

    const buttonPrev = artworkSeriesDialogEl.querySelector('.ma-gallery-scroller-nav__prev');
    const buttonNext = artworkSeriesDialogEl.querySelector('.ma-gallery-scroller-nav__next');

    const navigateScroller = (evt, type) => {
      galleryItems.forEach((item, idx) => {
        let currentVisible = inViewport(item, {
          container: galleryScroller,
          offset: -100
        });

        if (currentVisible) {
          const targetElIdx = (type === "next") ? idx + 1 : idx - 1;
          galleryItems[targetElIdx].scrollIntoView({
            behavior: "smooth",
          });
        }
      })
    }

    buttonPrev.addEventListener("click", (evt) => {
      navigateScroller(evt, 'prev')
    })

    buttonNext.addEventListener("click", (evt) => {
      navigateScroller(evt, 'next')
    })

    // Listen for scroll events as we;ll need to 
    // disable buttons when scroll reaches beginning or end
    // Setup isScrolling variable
    let isScrolling;
    galleryScroller.addEventListener('scroll', function (event) {

      // Clear our timeout throughout the scroll
      window.clearTimeout(isScrolling);

      // Set a timeout to run after scrolling ends
      isScrolling = setTimeout(function () {

        // Run the callback
        galleryItems.forEach((item, idx) => {

          let currentVisible = inViewport(item, {
            container: galleryScroller,
            offset: -100
          });

          if (currentVisible) {
            console.log('true')
            buttonPrev.disabled = false;
            buttonNext.disabled = false;
            // Disable button if reached beginning or end
            if (galleryItems.length - 1 === idx) {
              console.log('end of the line');
              buttonPrev.disabled = false;
              buttonNext.disabled = true;
            } else if (idx === 0) {
              console.log('start of the line');
              buttonPrev.disabled = true;
              buttonNext.disabled = false;
            }
          }
        })

      }, 66);

    }, false);
  })

}
