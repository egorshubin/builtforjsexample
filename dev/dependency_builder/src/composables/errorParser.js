export const getErrorMessage = (error) => {
    let message = '';

    const response = error.response

    if (response.status !== 400) {
        message = 'Error: ' + response.status + ' ' + response.statusText + '<br>'
    }

    if (response.data && typeof response.data.detail !== "undefined") {
        message += response.data.detail
    }

    return message
}

export const getErrorTrace = (error) => {
    let trace = null

    const response = error.response

    if (response.data
        && typeof response.data.trace !== "undefined"
        && response.data.trace !== ''
    ) {
        trace = response.data.trace
    }

    return trace
}
