if (typeof doyoo == 'undefined' || !doyoo) {
    var d_genId = function () {
        var id = '', ids = '0123456789abcdef';
        for (var i = 0; i < 34; i++) {
            id += ids.charAt(Math.floor(Math.random() * 16));
        }
        return id;
    };
    var doyoo = {
        env: {
            secure: false,
            mon: 'http://m8100.talk99.cn/monitor',
            chat: 'http://chat118b.talk99.cn/chat',
            file: 'http://static.soperson.com/131221',
            compId: 10029214,
            confId: 10034135,
            vId: d_genId(),
            lang: '',
            fixFlash: 0,
            subComp: 2726,
            _mark: '2a514f8be90fa0d9f7e9830ba74f4169ccf75bd466f652794b80f6146aa1a88bed034122d4826d7f'
        }, monParam: {
            index: -1,

            style: {mbg: '', mh: 100, mw: 50,
                elepos: '0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0',
                mbabg: '',
                mbdbg: '',
                mbpbg: ''},

            title: '\u6b22\u8fce\u5149\u4e34\u9e3f\u946b\u7f51\u7ad9',
            text: '\u6b22\u8fce\u5149\u4e34\u672c\u516c\u53f8\u7f51\u7ad9\uff01\u6211\u662f\u4eca\u5929\u7684\u5728\u7ebf\u503c\u73ed\u5ba2\u670d\uff0c\u5f88\u9ad8\u5174\u4e3a\u60a8\u670d\u52a1\u3002 ',
            auto: -1,
            group: '10036150',
            start: '00:00',
            end: '24:00',
            mask: false,
            status: true,
            fx: 0,
            mini: 1,
            pos: 0,
            offShow: 0,
            loop: 0,
            autoHide: 0,
            hidePanel: 0,
            miniStyle: 1,
            showPhone: 0,
            monHideStatus: [0, 5, 0],
            monShowOnly: ''
        }, panelParam: {
            category: 'icon',
            position: 1,
            vertical: 60,
            horizon: 5, mode: 1,
            target: '10036150',
            online: 'http://img.talk99.cn/liuhai/jinghongxinzaixiankefu.jpg',
            offline: 'http://img.talk99.cn/liuhai/jinghongxinzaixiankefu.jpg',
            width: 150,
            height: 417,
            status: 1,
            closable: 0,
            regions: [
                {type: "2", l: "16", t: "115", w: "115", h: "24", bk: "", v: "10037035"},
                {type: "2", l: "16", t: "149", w: "114", h: "24", bk: "", v: "10037036"},
                {type: "2", l: "16", t: "183", w: "114", h: "24", bk: "", v: "10037037"},
                {type: "2", l: "16", t: "217", w: "114", h: "24", bk: "", v: "10037038"},
                {type: "2", l: "16", t: "250", w: "114", h: "24", bk: "", v: "10037038"},
                {type: "2", l: "16", t: "284", w: "114", h: "24", bk: "", v: "10037039"},
                {type: "2", l: "16", t: "284", w: "114", h: "24", bk: "", v: "10037040"},
                {type: "0", l: "16", t: "320", w: "114", h: "24", bk: "", v: "4006633368"}
            ],
            collapse: 1, collapsed: 0, collapseIcon: 'http://img.talk99.cn/panchuiling/anniu777.png', expandIcon: 'http://img.talk99.cn/panchuiling/anniu7777.png', collapseW: 36, collapseH: 149, collapseT: 145



        }



    };

    if (typeof talk99Init == 'function') {
        talk99Init(doyoo);
    }


    document.write('<div id="doyoo_panel"></div>');


    document.write('<div id="doyoo_monitor"></div>');


    document.write('<div id="talk99_message"></div>')

    document.write('<div id="doyoo_share" style="display:none;"></div>');
    document.write('<lin' + 'k rel="stylesheet" type="text/css" href="http://static.soperson.com/131221/talk99.css?1401261"></li' + 'nk>');
    document.write('<scr' + 'ipt type="text/javascript" src="http://static.soperson.com/131221/talk99.js?140317" charset="utf-8"></scr' + 'ipt>');

}

