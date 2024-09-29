import axios from "axios";
import {apiUrl} from "@/config/constants";

export const processDependency = async (moduleName) => {
    const params = {
        action: 'processDependency',
        ajax: true,
        module: moduleName
    }

    return await axios.get(apiUrl, {params})
}