import React, { Component } from 'react';

export default class App extends Component {
    constructor(props) {
        super(props);

        this.setId();
        this.showVersion();
    }

    setId() {
        let url = new URL(location.href);
        let id = url.searchParams.get('id');

        if (!id || isNaN(Number(id))) {
            id = 1;
        }
        
        this.levelID = id;
    }

    showVersion() {
        let version = `v${VERSION}`;
        this.version = version;
        console.log(version);
    }
}