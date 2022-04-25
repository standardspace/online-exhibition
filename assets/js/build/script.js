// Go wild...
import Macy from "macy";

const grid = document.querySelector('.ma-gallery');

if (grid) {

  const maGalleryGrid = Macy({
    container: grid,
    trueOrder: true,
    waitForImages: true,
    mobileFirst: true,
    margin: 8,
    columns: 1,
    breakAt: {
      520: {
        margin: 16,
        columns: 2
      },
      1024: {
        margin: 32,
        columns: 3
      },
      1440: {
        columns: 4
      }
    }
  });

  maGalleryGrid.on(maGalleryGrid.constants.EVENT_IMAGE_COMPLETE, function (ctx) {
    ctx.instance.container.classList.add('ma-gallery--loaded');
  });

}
