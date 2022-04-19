// Go wild...
import Macy from "macy";

const maGalleryGrid = Macy({
  container: '.ma-gallery',
  trueOrder: false,
  waitForImages: false,
  mobileFirst: true,
  margin: 8,
  columns: 1,
  breakAt: {
    520: {
      margin: {
        x: 16,
        y: 8
      },
      columns: 2
    },
    1024: {
      margin: {
        x: 32
      },
      columns: 3
    },
    1440: {
      margin: {
        x: 32
      },
      columns: 4
    },
    // 1200: 5,
    // 940: 3,
    // 520: 2
  }
});