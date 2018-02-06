(function() {
    init();
}).call(this);


function init() {
    var url = "/api/pixel-point/show";
    var data = [
        ["ids", ""]
    ];

    var ads = document.getElementsByClassName("area-ads");

    for (var i=0;i < ads.length; i++) {
        data[0][1] === "" ? data[0][1] += getAdInfo(ads[i]).id :  data[0][1] += "," + getAdInfo(ads[i]).id;
    }

    if (data[0][1].length > 0) {
        var xhr = createRequest({url: url, data: data, isResponse: true});
        xhr.onreadystatechange = function () {
            if (this.readyState === 4) {
                var data = {message: '', error: true, adsIds: [], ads: []};
                try {
                    data = JSON.parse(this.response);
                } catch (e) {}

                if (this.status >= 500) {
                    setTimeout(function () {
                        createRequest({url: url, data: data, isResponse: true});
                    }, 5000);
                } else if(this.status === 200) {
                    var adsIds = [];
                    for (var i=0;i<data.ads.length;i++) {
                        initAd(data.ads[i]) ? adsIds.push(initAd(data.ads[i])) : false;
                    }
                    showed(adsIds)
                }
            }
        };

        xhr.send(xhr.mybody);
    }
}

function initAd(parameters) {
    var id = parameters.id || "",
        href = parameters.href || "",
        placeId = parameters.placeId || "",
        data = parameters.data || "";

    var ad = document.querySelector("ins[data-area-ad-client='"+ placeId +"']");
    if(!ad) {
        return null;
    }
    ad.addEventListener('click', clicked, false);
    ad.setAttribute("data-area-ad-id", id);
    var a = document.createElement("a");
    a.href = href;
    a.innerHTML = data;
    ad.innerHTML = a.outerHTML;

    return id;
}

/**
 * ads ids send to server event showed
 * */
function showed(adsIds) {
    var url = "/api/pixel-point/showed";
    var data = [
        ["ids", adsIds.join(",")]
    ];

    createRequest({url: url, data: data});
}

/**
 * Html object
 * */
function getAdInfo(ad) {
    return {
        'id': ad.getAttribute("data-area-ad-client")
    };
}

function clicked(event) {
    event.preventDefault();

    var url = "/api/pixel-point/clicked";
    var data = [
        ["id", this.getAttribute("data-area-ad-id")]
    ];
    createRequest({url: url, data: data});
}

function createRequest(parameters) {
    var url = parameters.url,
        type = parameters.type || "POST",
        data = parameters.data,
        isResponse = parameters.isResponse;

    var xhr = new XMLHttpRequest();
    var body = '';

    for (var i=0;i<data.length;i++) {
        body += "&" + data[i][0] + '=' + encodeURIComponent(data[i][1]);
    }
    xhr.mybody = body;
    xhr.open(type, url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    if (isResponse) {
        return xhr;
    } else {
        xhr.onreadystatechange = function () {
            if (this.readyState === 4) {
                var data = {message: '', error: true};
                try {
                    data = JSON.parse(this.response);
                } catch (e) {
                }

                if (this.status >= 500 || data.error) {
                    setTimeout(function () {
                        createRequest({url: url, type: type, data: data});
                    }, 5000);
                }
            }
        };

        xhr.send(body);
    }
}