import React from "react";
import ReactDOM from "react-dom";
import { createStore} from 'redux';


class Liquid extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      data: null,
      isLoading: false,
    };
  }
  componentDidMount() {
    var _this = this;
    this.setState({ isLoading: true });
    fetch('http://react.local/colors.php')
      .then(response => response.json())
      .then(function(data){
        return _this.setState({ data:data,isLoading: false });
    });
  }
  render() {
    const { data, isLoading } = this.state;
    console.log(data);
    if (data !== null) {
      if (data.backgroundheader !== null) {
        return (<div class="container h1" style={data.backgroundheader}>Test Hello</div>);
      }
    }
      return <p>Loading ...</p>;
  }
}

const app = document.getElementById('root');

ReactDOM.render(
  <Liquid/>,
app);
