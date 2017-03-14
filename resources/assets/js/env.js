/**
 * Created by jrpikong on 14/03/17.
 */
export const clientId  ='2'
export const clientSecret = 'jDFmLYsT5pEUxSaErG48uDNzHDdq0tVZQkoGwYcj'


export const getHeader = function () {
    const tokenData = JSON.parse(window.localStorage.getItem('authUser'))
    const headers = {
        'Accept' : 'application/json',
        'Authorization' : 'Bearer ' + tokenData.access_token
    }

    return headers
}