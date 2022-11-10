import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-marks-slider', IndexField)
  app.component('detail-marks-slider', DetailField)
  app.component('form-marks-slider', FormField)
})
