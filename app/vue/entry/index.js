
window.Index = {

  el: '#pagekit-logger-index',

  data: function() {
    return {
      logs: window.$data.logs,
      exceptions: [],
      messages: [],
      hasExceptions : false,
      hasMessages: false
    }
  },

  ready: function(){
    var $this = this;

    this.logs.forEach(function(log) {

      if (log.exception) {

        $this.exceptions.push(log.exception);

        $this.$set('hasExceptions', true);

      } else {

        $this.messages.push(log.message);

        $this.$set('hasMessages', true);
      }
    });
  },

  components: {
    'log-exception' : require('./../components/index/log-exception.vue'),
    'log-message'   : require('./../components/index/log-message.vue')
  }
};
Vue.ready(window.Index);
